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
                'title' => 'required|max:50',
                'body' => 'required|max:500',
                'category' => 'required',
                'budget' => 'required',
                'page' => 'required|numeric',
                'size' => 'required',
                'file-format' => '',
                'desiredColorImpression' => 'numeric',
                'desiredContentImpression' => 'numeric',
                'application-deadline' => 'date_format:Y-m-d',
                'deadline' => 'required|date_format:Y-m-d',
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
                'size' => 'サイズ',
                'file-format' => 'ファイル形式',
                'desiredColorImpression' => '希望の色のイメージ',
                'desiredContentImpression' => '希望イメージ',
                'application-deadline' => '募集締切',
                'deadline' => '納品希望日',
            ];
    }
}
