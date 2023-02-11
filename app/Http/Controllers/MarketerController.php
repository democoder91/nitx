<?php

namespace App\Http\Controllers;

use App\Mail\marketer\newMarketer;
use App\Models\Marketer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MarketerController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:marketers',
        ]);
        $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $code = str_shuffle($characters)[0] . rand(1, 9);
        Marketer::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "code" => $code,
        ]);
        Mail::to($request->email)->send(new newMarketer($code));
        return redirect()->route('index');
    }
}
