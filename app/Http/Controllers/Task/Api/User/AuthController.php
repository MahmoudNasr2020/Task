<?php

namespace App\Http\Controllers\Task\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiTrait;
use App\Http\Traits\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    use ApiTrait,Image;

    public function register(Request $request)
    {
        $vaildate = Validator::make($request->all(),[
            'name'            => ['required','string'],
            'email'           => ['required','email','unique:users,email'],
            'phone_number'    => ['required','unique:users,phone_number'],
            'password'        => ['required','confirmed']
        ]);
        if ($vaildate->fails())
        {
            return $this->response($vaildate->errors(),'success',422);
        }
        $user = User::create([
            'name'    =>$request->name,
            'email'   =>$request->email,
            'password'=>Hash::make($request->password),
            'phone_number'=>$request->phone_number,
    
            ]);
        $user->sendEmailVerificationNotification();
        $data = 'The registration has been completed successfully, we will send an email to you when your account is activated';
        return $this->response($data,'success',200);

    }

    public function login(Request $request)
    {

        $vaildate = Validator::make($request->all(),[
            'email'    => ['required','email'],
            'password' => ['required']
        ]);
        if ($vaildate->fails())
        {
            return $this->response($vaildate->errors(),'success',422);
        }

        config(['auth.guards.api.driver'=>'session']);
        if(!$user = Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return $this->response('email or password incorrect','success',200);
        }
        $token = Auth::user()->createToken('user')->accessToken;
        $data = [
            'user'=>Auth::user(),
            'token'=>$token
            ];
        return $this->response($data,'success',200);

    }



    public function logout()
    {
        $tokens =  Auth::user()->tokens();
        $tokens->delete();
        return $this->response('logout successfully','success',200);
    }

    public function unauthenticated()
    {
        return $this->response('Unauthenticated','Unauthorized',401);
    }

}
