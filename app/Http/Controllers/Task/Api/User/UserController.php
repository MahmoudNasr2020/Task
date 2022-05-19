<?php

namespace App\Http\Controllers\Task\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiTrait;
use App\Http\Traits\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use Image,ApiTrait;
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if(!$user)
        {
            return $this->response('Not Found This Item','success',404);
        }
        $validator = Validator::make($request->all(),
            [
                'name' => ['required','string'],
                'email' => ['required','email','unique:users,email,'.\request()->route('id')],
                'phone_number'  => ['required','unique:users,phone_number,'.\request()->route('id')],
                'password' => ['sometimes','nullable','min:8'],
                'photo' => ['sometimes','nullable','image','max:2048'],
            ]);

        if($validator->fails())
        {
            return $this->response($validator->errors(),'success',422);
        }
        $data = $request->all();

        if($request->hasFile('photo')){
            $this->deleteImage('Task/Images/'.$user->photo);
            $data['photo'] = $this->imageUpload('users',$request->file('photo'));
        }

        if($request->has('password'))
        {
            $data['password'] = Hash::make($request->password);
        }
        else
        {
            unset($data['password']);
        }

        $user->update($data);
        return $this->response($user,'success',201);

    }
}
