<?php

namespace App\Http\Requests\Task\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditUserRequest extends FormRequest
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
            'email'         =>        ['required','email',Rule::unique('users','email')->ignore($this->id,'id')],
            'password'      =>        ['sometimes','nullable','confirmed'],
            'image'         =>        ['sometimes','nullable','image','max:2048'],
        ];
    }

    /** @noinspection DuplicatedCode */
    public function messages()
    {
        return [
            'name.required'=>'الاسم مطلوب',
            'name.string'=>'الاسم غير صالح',
            'email.required'=>'الايميل مطلوب',
            'email.email'=>'الايميل غير صالح',
            'email.unique'=>'الايميل موجود بالفعل',
            'password.confirmed'=>'كلمة السر غير متطابقة',
            'image.image' => 'الصورة غير صالحة',
            'image.max' => 'حجم الصورة يجب ان يكون اقل من 2048',


        ];
    }
}
