<?php

namespace App\Http\Controllers\Task\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiTrait;
use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    use ApiTrait;
    public function verify($user_id,Request $request)
    {
        if(!$request->hasValidSignature())
        {
            $data = 'This URL is not valid';
            return $this->response($data,'error',401);
        }

        $user = User::find($user_id);
        if(!$user->hasVerifiedEmail())
        {
            $user->markEmailAsVerified();
        }
        return redirect()->to('/');
    }
    
    public function resend()
    {

        if(auth()->user()->hasVerifiedEmail())
        {
            $data = 'Email Already Verified';
            return $this->response($data,'error',401);
        }

        auth()->user()->sendEmailVerificationNotification();

        $data = 'Email verification link sent on your email id';
        return $this->response($data,'error',401);
    }
}
