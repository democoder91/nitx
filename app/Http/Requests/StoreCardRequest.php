<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreCardRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'payment-card-owner-name' => 'required|max:255',
            'payment-card-number' => 'required|size:16',
            'payment-card-cvc' => 'required|size:3',
            'payment-card-expire-date' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'payment-card-owner-name.required' => 'Card Owner Name is required',
            'payment-card-number.required' => 'Card Number is required',
            'payment-card-cvc.required' => 'Card CVC is required',
            'payment-card-expire-date.required' => 'Card Expire Date is required',
            'payment-card-number.size' => 'Card Number digits must be 16 digits',
            'payment-card-cvc.size' => 'Card CVC digits must be 3 digits',
        ];
    }
}
