<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Exception;

class CreatioService
{
    private $bpmcsrf;
    private $jar;

    public function __construct()
    {
        $this->jar = Cache::has('creatio_cookies') ? Cache::get('creatio_cookies') : new \GuzzleHttp\Cookie\CookieJar();
        $this->bpmcsrf = Cache::has('creatio_bpmcsrf') ? Cache::get('creatio_bpmcsrf') : null;
    }

    function login($username, $password)
    {
        $result = (Object)array(
            'success' => false,
            'message' => null,
            'error' => null
        );

        $uri = env('CREATIO_URL'). '/ServiceModel/AuthService.svc/Login';
        try {
            Cache::forget('creatio_cookies');
            Cache::forget('creatio_bpmcsrf');

            $response = Http::withOptions([
                'cookies' => $this->jar,
            ])->withHeaders([
                'ForceUseSession' => 'true'
            ])->post($uri, [
                'UserName' => $username ?? env('CREATIO_USERNAME'),
                'UserPassword' => $password ?? env('CREATIO_PASSWORD'),
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
                Cache::put('creatio_cookies', $this->jar, time() + 86400);
                Cache::put('creatio_bpmcsrf', $this->bpmcsrf, time() + 86400);
            }
        }

        return $result;
    }
}