<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreSequenceRequest extends FormRequest
{
    public mixed $run_for_ever;

    // create a variable to hold the rules
    public array $rules = [
        'minutes.*' => 'required|numeric|min:0|max:60',
        'seconds.*' => 'required|numeric|min:0|max:60',
        'sequence_name' => 'required|max:128',
        'sequence_start_date' => 'required|date',
        'days' => 'required'
    ];
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
        // if the request has value in minutes or seconds, then the other one should not be required
        $minutes = $request->input('minutes');
        $seconds = $request->input('seconds');
        if ($minutes != null && $minutes != '' && $minutes != 0) {
            $this->rules['seconds.*'] = 'nullable|numeric|min:0|max:60';
        }
        if ($seconds != null && $seconds != '' && $seconds != 0) {
            $this->rules['minutes.*'] = 'nullable|numeric|min:0|max:60';
        }

        return $this->rules;
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
