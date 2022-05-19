<?php

namespace App\Http\Requests\Task\User;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          =>        ['required','string'],
            'email'        =>        ['required','email','unique:users,email'],
            'password'      =>        ['required','confirmed'],
            'image'        =>         ['required','image','max:2048'],
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'الاسم مطلوب',
            'name.string'=>'الاسم غير صالح',
            'email.required'=>'الايميل مطلوب',
            'email.unique'=>'الايميل موجود بالفعل',
            'password.required'=>'كلمة السر مطلوبة',
            'password.confirmed'=>'كلمة السر غير متطابقة',
            'image.required' => 'الصورة مطلوبة',
            'image.image' => 'الصورة غير صالحة',
            'image.max' => 'حجم الصورة يجب ان يكون اقل من 2048',
        ];
    }
}
