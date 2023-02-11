<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreSequenceRequest extends FormRequest
{
    public mixed $run_for_ever;

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
    public function rules(Request $request)
    {
        return [
            'minutes.*' => 'required|numeric|min:0|max:60',
            'seconds.*' => 'required|numeric|min:0|max:60',
            'sequence_name' => 'required|max:128',
            'sequence_start_date' => 'required|date',
            'days' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'minutes.*.max' => 'The minutes should not be greater than 60 minutes',
            'seconds.*.max' => 'The seconds should not be greater than 60 seconds',
            'days.required' => 'The sequence should have day/days for repetition'
        ];
    }

}
