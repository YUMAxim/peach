<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use App\Models\Recruit;

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
                // 'title' => [
                //     'required',
                //     'min:5',
                //     'max:50',
                // ],
                // 'body' => [
                //     'required',
                //     'min:30',
                //     'max:500',
                // ],
                // 'book_category_id' => [
                //     'required',
                // ],
                // 'rewards.*' => [
                //     // 'required',
                //     'integer',
                // ],
                // 'attachedFile' => [
                //     'file',
                // ],
                // 'budget' => [
                //     'required',
                //     'integer',
                // ],
                // 'application_deadline' => [
                //     'required',
                //     'date',
                // ],
                // 'deadline' => [
                //     'required',
                //     'integer',
                // ],
            ];
    }

    public function passedValidation()
    {
        $this->dateFormat();
    }

    public function dateFormat()
    {
        $date = new Carbon;
        $year = $this->applicationDeadlineYear;
        $month = $this->applicationDeadlineMonth;
        $day = $this->applicationDeadlineDay;
        $hour = 21;
        $min = $date->minute;
        $sec = $date->second;

        $application_deadline = $date->setDateTime($year, $month, $day, $hour, $min, $sec);

        $year = $this->deadlineYear;
        $month = $this->deadlineMonth;
        $day = $this->deadlineDay;
        $deadline = $date->setDate($year, $month, $day);

        $this->merge([
            'application_deadline' => $application_deadline,
            'deadline' => $deadline,
        ]);
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
                'bookCategory' => 'カテゴリー',
                'budget' => '予算',
<<<<<<< HEAD
                'recruiter_role' => 'ご自身の担当',
                'recruits_role' => '募集する担当',
                'applicationDeadlineYear' => '募集締切',
                'applicationDeadlineMonth' => '募集締切',
                'applicationDeadlineDay' => '募集締切',
                'deadlineYear' => '納品希望日',
                'deadlineMonth' => '納品希望日',
                'deadlineDay' => '納品希望日',
=======
                'page' => 'ページ数',
                'booksize' => 'サイズ',
<<<<<<< HEAD
                'recruiter_role' => 'ご自身の担当',
                'recruits_role' => '募集する担当',
                'file-format' => 'ファイル形式',
                'desired_color_impression' => '希望の色のイメージ',
                'desired_content_impression' => '希望イメージ',
=======
                'my_role' => 'ご自身の担当',
                'recruits_role' => '募集する担当',
                'file-format' => 'ファイル形式',
                'desired_color_Impression' => '希望の色のイメージ',
                'desired_content_Impression' => '希望イメージ',
>>>>>>> develop
                'application-deadline' => '募集締切',
                'deadline' => '納品希望日',
>>>>>>> origin/feature/recruit-form
            ];
    }

    public function messages()
    {
        return [
            'required'    => ':attributeを入力してください。',
            'max'         => ':attributeは:max文字以内で入力してください。',
            'integer' => ':attributeは整数で入力してください。',
            'date_format' => ':attributeを入力してください。',
        ];
    }

}
