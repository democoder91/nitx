<?php

namespace App\Http\Requests;

use App\Models\Folder;
use App\Models\Sequence;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetChildFolderPage extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        $folder = Folder::find($request->id);
        if ($request->id && !$folder) {
            return false;
        }
        if (Auth::user()->id === $folder->media_owner_id) {
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
    public function rules()
    {
        return [

        ];
    }
}
