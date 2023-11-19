<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Type\Integer;
use App\Rules\ContactRule;

class ContactRequest extends FormRequest
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
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'postcode' => ['required', 'regex:/^[0-9]{3}-[0-9]{4}$/'],
            //new ContactRule()
            //ハイフンあり半角8桁の数値型
            'address' => ['required', 'string', 'max:255'],
            'building_name' => ['nullable', 'string', 'max:255'],
            'opinion' => ['required', 'string', 'max:120']
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '名字を入力してください',
            'last_name.string' => '名字を文字列で入力してください',
            'last_name.max' => '名字を255文字以下で入力してください',
            'first_name.required' => '名前を入力してください',
            'first_name.string' => '名前を文字列で入力してください',
            'first_name.max' => '名前を255文字以下で入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを文字列で入力してください',
            'email.email' => '有効なメールアドレス形式を入力してください',
            'email.max' => 'メールアドレスを255文字以下で入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'postcode.regex' => '郵便番号を指定の形式で入力してください',
            'address.required' => '住所を入力してください',
            'address.string' => '住所を文字列で入力してください',
            'address.max' => '住所を255文字以下で入力してください',
            'tel.required' => '電話番号を入力してください',
            'building_name.string' => '建物名を文字列で入力してください',
            'building_name.max' => '建物名を255文字以下で入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.string' => 'ご意見を文字列で入力してください',
            'opinion.max' => 'ご意見を120文字以内で入力してください',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge(['postcode' => mb_convert_kana($this->postcode, 'a')]);
    }
}
