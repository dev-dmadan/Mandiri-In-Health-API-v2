<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Client\PendingRequest;
use Exception;
use Illuminate\Http\Client\ConnectionException;

class CreatioService
{
    private $bpmcsrf;
    private $jar;
    private $username;
    private $password;
    private $request;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->request = (Object)[];

        $this->jar = Cache::has("creatio_cookies_".$username) ? Cache::get("creatio_cookies_".$username) : new \GuzzleHttp\Cookie\CookieJar();
        $this->bpmcsrf = Cache::has("creatio_bpmcsrf_".$username) ? Cache::get("creatio_bpmcsrf_".$username) : null;
    }

    public function login()
    {
        $result = (Object)array(
            'success' => false,
            'message' => null,
            'error' => null
        );

        $uri = env('CREATIO_URL'). '/ServiceModel/AuthService.svc/Login';
        try {
            Cache::forget("creatio_cookies_".$this->username);
            Cache::forget("creatio_bpmcsrf_".$this->username);

            $response = Http::withOptions([
                'cookies' => $this->jar,
            ])->withHeaders([
                'ForceUseSession' => 'true',
                'Accept' => 'application/json',
                'Content-Type' => 'application/json; charset=utf-8'
            ])->post($uri, [
                'UserName' => $this->username ?? env('CREATIO_USERNAME'),
                'UserPassword' => $this->password ?? env('CREATIO_PASSWORD'),
            ]);
            if(!$response->successful() || $response->failed()) {
                $response->throw();
            }

            $body = (Object)$response->json();
            if($body->Code != 0 || !empty($body->Exception)) {
                $result->error = $body->Exception;
                throw new Exception($body->Message);
            }
            
            $this->bpmcsrf = $response->cookies()->getCookieByName('BPMCSRF')->getValue();
            $result->success = true;
        } catch (Exception $e) {
            $result->message = $e->getMessage();
        } finally {
            if($result->success) {
                Cache::put("creatio_cookies_".$this->username, $this->jar, time() + 86400);
                Cache::put("creatio_bpmcsrf_".$this->username, $this->bpmcsrf, time() + 86400);
            }
        }

        return $result;
    }

    public function oData4($entityName, $param = null)
    {
        $this->request->type = 'odata';
        $this->request->endpoint = $entityName;
        $this->request->param = $param;
        
        return $this;
    }

    public function rest($serviceName, $endpoint, $param = null)
    {
        $this->request->type = 'rest';
        $this->request->serviceName = $serviceName;
        $this->request->endpoint = $endpoint;
        $this->request->param = $param;

        return $this;
    }

    public function get($param)
    {
        while (true) {
            $response = $this->defaultRequest()
                ->get($this->getUri(), $param);

            if($response->failed()) {
                try {
                    $response->throw();
                } catch (Exception $e) {
                    return $this->errorResponse($e->getMessage(), $response->status());
                }
            }

            if(empty($response->json())) {
                $tryLogin = $this->login();
                if($tryLogin->success) {
                    continue;
                }

                return $this->errorResponse('Unauthenticated', 401);
            }

            return $this->successResponse($response->body());
        }
    }

    public function post($data)
    {
        $i = 0;
        while ($i < 2) {
            $response = $this->defaultRequest('POST', $this->getUri(), $this->request->param, $data);
            if($response->failed()) {
                $handlingError = $this->handlingError($response);
                if($handlingError != null) {
                    return $handlingError;
                }

                $i++;
                continue;
            }

            if(empty($response->json())) {
                $tryLogin = $this->login();
                if($tryLogin->success) {
                    $i++;
                    continue;
                }

                return $this->errorResponse('Unauthenticated', 401);
            }

            return $this->successResponse($response->json(), $response->status());
        }
    }

    public function put($id, $data)
    {
        $uri = $this->request->type == 'odata' ? $this->getUri().'('.$id.')' : $this->getUri().'/'.$id;
        $i = 0;
        while ($i < 3) {
            $response = $this->defaultRequest('PUT', $uri, $this->request->param, $data);
            if($response->failed()) {
                $handlingError = $this->handlingError($response);
                if($handlingError != null) {
                    return $handlingError;
                }

                $i++;
                continue;
            }

            if(empty($response->json())) {
                $tryLogin = $this->login();
                if($tryLogin->success) {
                    $i++;
                    continue;
                }

                return $this->errorResponse('Unauthenticated', 401);
            }

            return $this->successResponse($response->json());
        }
    }

    public function patch($id, $data)
    {
        $uri = $this->request->type == 'odata' ? $this->getUri().'('.$id.')' : $this->getUri().'/'.$id;
        $i = 0;
        while ($i < 3) {
            $response = $this->defaultRequest('PATCH', $uri, $this->request->param, $data);
            if($response->failed()) {
                $handlingError = $this->handlingError($response);
                if($handlingError != null) {
                    return $handlingError;
                }

                $i++;
                continue;
            }
            
            if(($this->request->type == 'odata' && !$response->noContent()) || 
                ($this->request->type == 'rest' && empty($response->json()))) {
                $tryLogin = $this->login();
                if($tryLogin->success) {
                    $i++;
                    continue;
                }

                return $this->errorResponse('Unauthenticated', 401);
            }

            return $this->successResponse($response->json());
        }
    }

    public function delete($id, $data = null)
    {
        $uri = $this->request->type == 'odata' ? $this->getUri().'('.$id.')' : $this->getUri().'/'.$id;
        $i = 0;
        while ($i < 3) {
            $response = $this->defaultRequest('DELETE', $uri, $this->request->param, $data);
            if($response->failed()) {
                $handlingError = $this->handlingError($response);
                if($handlingError != null) {
                    return $handlingError;
                }

                $i++;
                continue;
            }

            if(($this->request->type == 'odata' && !$response->noContent()) || 
                ($this->request->type == 'rest' && empty($response->json()))) {
                $tryLogin = $this->login();
                if($tryLogin->success) {
                    $i++;
                    continue;
                }

                return $this->errorResponse('Unauthenticated', 401);
            }

            return $this->successResponse($response->json());
        }
    }

    private function getUri()
    {
        $api = empty($this->request->serviceName) ? $this->request->endpoint : $this->request->serviceName.'/'.$this->request->endpoint;
        $uri = env('CREATIO_URL').'/0/'.$this->request->type.'/'.$api;

        return $uri;
    }

    private function getDefaultHeader()
    {
        return [
            'ForceUseSession' => 'true',
            'BPMCSRF' => $this->bpmcsrf,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ];
    }

    private function defaultRequest($method, $uri, $param = [], $data = [])
    {
        $request = Http::withOptions([
            'cookies' => $this->jar,
        ])
        ->withHeaders($this->getDefaultHeader())
        ->timeout(60*5);

        switch (strtolower($method)) {
            case 'post':
                $request = $request->post($uri, $data);
                break;

            case 'put':
                $request = $request->put($uri, $data);
                break;

            case 'patch':
                $request = $request->patch($uri, $data);
                break;

            case 'delete':
                $request = $request->delete($uri, $data);
                break;

            case 'get':           
            default:
                $request = $request->get($uri, $param);
                break;
        }

        return $request;
    }

    private function handlingError($response)
    {
        $isBodyExists = !empty($response->body()) && !empty($response->json()) ? true : false;
        if($response->unauthorized()) {
            $tryLogin = $this->login();
            return $tryLogin->success ? 
                null : 
                $this->errorResponse($isBodyExists ? $response->json() : "Unauthenticated", $response->status());
        }

        try {
            $response->throw();
        } catch (Exception $e) {
            return $this->errorResponse($isBodyExists ? $response->json() : $e->getMessage(), $response->status());
        }
    }

    private function successResponse($body, $statusCode = 200)
    {
        return response()->json([
            'success' => true,
            'body' => $body
        ], $statusCode);
    }

    private function errorResponse($message, $statusCode)
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], $statusCode);
    }
}