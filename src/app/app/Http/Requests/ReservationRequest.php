<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
          return true; // trueに設定すると、リクエストは常に認可
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'shop_id' => 'required|exists:shops,id',
            'reservationDateTime' => 'required|date',
            'numberOfPeople' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'shop_id.required' => '店舗IDは必須です。',
            // 'shop_id.exists' => '指定された店舗が存在しません。',
            'reservationDateTime.required' => '予約日時は必須です。',
            'reservationDateTime.date' => '有効な日時を入力してください。',
            'numberOfPeople.required' => '人数は必須です。',
            'numberOfPeople.integer' => '人数は整数でなければなりません。',
            'numberOfPeople.min' => '人数は1人以上でなければなりません。',
        ];
    }
}
