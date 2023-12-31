<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use App\Services\CreatioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AuthController extends Controller
{
    protected $creatio;

    public function __construct(Request $request)
    {
        $this->creatio = new CreatioService($request->username, $request->password);
    }

    public function login(Request $request)
    {
        $debug = [];

        $debug[] = "Login Creatio";

        $tryLogin = $this->creatio->login();
        
        $debug[] = $tryLogin;
        
        if(!$tryLogin->success) { 
            dd($debug);

            return response()->json([   
                'success' => false,
                'message' => 'Username or Password is wrong',
                'user' => null,
            ], 401);
        }

        $user = User::where('username', $request->username)->first();
        $contact = $this->getContact($user->id);
        $token =  $user->createToken(
            name: 'WebToken',
            expiresAt: now()->addMonth(1),
            // expiresAt: now()->addSecond(10),
        );

        return response()->json([
			'success' => true,
            'message' => 'Login successfully',
            'user' => [
                'username' => $user->username,
                'encrypt_password' => Crypt::encryptString($request->password),
                'name' => $contact->contact_name,
                'contact_id' => $contact->contact_id,
                'kanal_id' => $contact->kanal_id,
                'is_agent' => $contact->is_agent,
                'token' => $token->plainTextToken,
                'expires_at' => $token->accessToken->expires_at
            ],
		], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Successfully logged out'
        ], 200);
    }

    public function validateToken(Request $request)
    {
        return response()->json($request->user('sanctum') ? true : false);
    }

    private function getContact($userId)
    {
        return Contact::with('KANALDISTRIBUSI')
            ->with('LNAMAAGEN')
            ->with('User')
            ->with('Type')
            ->select(
                'MdrLKANALDISTRIBUSIId',
                'MdrLNAMAAGENId',
                'TypeId', 
                'Id', 
                'Name'
            )
            ->whereHas('User', function($query) use($userId) {
                $query->where('Id', $userId);
            })
            ->get()
            ->map(function($item) {
                $agent = !empty($item->agent) ? $item->agent : null;

                return (Object)[
                    'contact_id' => $item->Id,
                    'contact_name' => $item->Name,
                    'contact_type' => !empty($item->type) ? $item->type->getDisplayValue() : "",
                    'agent' => !empty($agent) ? $agent->MdrName : "",
                    'agent_notes' => !empty($agent) ? $agent->MdrNotes : "",
                    'agent_email' => !empty($agent) ? $agent->MdrEmailPribadi : "",
                    'kanal_name' => !empty($item->kanal) ? $item->kanal->getDisplayValue() : "",
                    'kanal_id' => $item->MdrLKANALDISTRIBUSIId,
                    'is_agent' => strtolower($item->TypeId) == '806732ee-f36b-1410-a883-16d83cab0980' ? true : false,
                ];
            })
            ->first();
    }
}
