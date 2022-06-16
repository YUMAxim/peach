<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            // 'body' => [
            //     'required',
            //     function($attribute, $value, $fail) {
            //         if ($value = 'foo')
            //         {
            //             // echo 'form request' . PHP_EOL;
            //             // dd($attribute,$value,$fail);
            //             $fail('hello,world');
            //         }
            //     },
            // ],
            // 'completion_deadline' => [
            //     'required|date_format:Y-m-d',
            // ]
        ];
    }

    /**
     * Set the attribute
     *
     * @return array
     **/
    public function attributes()
    {
        return
            [
                'body' => '提案文の詳細',
                'recruits_role' => '募集する担当',
                'completion_deadline' => '完成予定日',
            ];
    }

    public function messages()
    {
        return [
            'required'    => ':attributeを入力してください。',
            'max'         => ':attributeは:max文字以内で入力してください。',
            'date_format' => ':attributeを入力してください。',
        ];
    }

}
