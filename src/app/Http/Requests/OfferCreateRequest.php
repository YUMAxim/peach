<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use App\Models\Recruit;
use App\Models\Offer;

class OfferCreateRequest extends FormRequest
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
        // dd($this);
        return [
            'applicationDeadline' => [
                'after:now',
            ],
            'already' => [
                function ($attribute, $value, $fail) {
                    $recruitId = $this->route('recruit')->id;
                    $userId = auth()->id();
                    $offer = Offer::where(function ($q) use ($recruitId, $userId) {
                        $q->where('recruit_id', $recruitId);$q->where('user_id', $userId);
                    })->get();
                    $already = $offer->isNotEmpty();
                    // dd($already);
                    if($already) {
                        $fail('既に提案したことのある応募です。');
                    }
                }
            ],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'now' => Carbon::now(),
            'applicationDeadline' => $this->route('recruit')->application_deadline,
            'already' => NULL,
        ]);
    }

    public function attributes()
    {
        return
            [
                'applicationDeadline' =>'応募期限',
            ];
    }

    public function messages()
    {
        return [
            'after' => ':attributeを過ぎています。'
        ];
    }
}
