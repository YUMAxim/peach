<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecruitRequest extends FormRequest
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
        return
            [
                'user_id' => '',
                'title' => 'required|max:50',
                'body' => 'required|max:500',
                'category' => 'required',
                'page' => 'required|numeric',
                'booksize' => 'required',
                'budget' => 'required|numeric',
                'recruits_reward' => 'required|numeric',
                'recruiter_role' => '',
                'application-deadline' => 'date_format:Y-m-d',
                'deadline' => 'required|date_format:Y-m-d',
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

    /**
     * Set the attribute
     *
     * @return array
     **/
    public function attributes()
    {
        return
            [
                'title' => '募集タイトル',
                'body' => '募集内容の詳細',
                'category' => 'カテゴリー',
                'budget' => '予算',
                'page' => 'ページ数',
                'booksize' => 'サイズ',
                'recruiter_role' => 'ご自身の担当',
                'recruits_role' => '募集する担当',
                'file-format' => 'ファイル形式',
                'desired_color_impression' => '希望の色のイメージ',
                'desired_content_impression' => '希望イメージ',
                'application-deadline' => '募集締切',
                'deadline' => '納品希望日',
            ];
    }
}
