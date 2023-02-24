<?php

namespace App\Http\Requests;

use App\Models\Sequence;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateSequenceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    // variable to hold the rules
    public array $rules = [
        'minutes.*' => 'numeric|min:0|max:60',
        'seconds.*' => 'numeric|min:0|max:60',
        'sequence_name' => 'max:128',
        'sequence_start_date' => 'date',
    ];
    public function authorize(Request $request)
    {
        $sequence = Sequence::find($request->id);
        if ($request->id && !$sequence) {
            return false;
        }
        if (Auth::user()->id === $sequence->media_owner_id) {
            return true;
        } else {
            return false;
        }
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
        ];
    }
}
