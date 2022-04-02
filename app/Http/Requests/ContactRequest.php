<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PostCodeRule;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // if ($this->path() == '/contact') {
            return true;
        // } else {
        //     return false;
        // }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => 'required',
            'gender' => 'required|digits_between:1,2',
            'email' => 'required|email',
            'postcode' => ['required', new PostCodeRule()],
            'address' => 'required',
            'building_name'=> 'nullable',
            'opinion' => 'required|max:120',
        ];
    }
    public function messages()
    {
        return [
            'fullname.required' => 'お名前を入力してください。',
            'gender.required' => '性別を選択してください。',
            'gender.digits_between' => '性別を選択してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メールアドレスの形式で入力してください。',
            'postcode.required' => '郵便番号を入力してください。',
            'address.required' => '住所を入力してください。',
            'opinion.required' => 'ご意見を入力してください。',
            'opinion.max' => 'ご意見は120文字以内で入力してください。',
        ];
    }
}
