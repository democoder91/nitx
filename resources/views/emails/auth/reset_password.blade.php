@extends('emails.email_layout')
@section('title', 'Password Reset')
@section('sub-title', '')
@section('img', 'https://nitx-mail-assets.s3.me-south-1.amazonaws.com/illustrations/PNG/Artboard+2.png')

@section('massage')
    You requested a password reset, to reset click the button below. If you didn't make this request simply ignore this message
@endsection

@section('btn')
    <td style="font-size:14px; line-height:16px; text-align:center; min-width:auto !important;">
        <a href="{{ route('reset.password.get', $token) }}" target="_blank"
           style="color:#ffffff; background: #0010F7; border: 1px solid #0010F7; border-radius:8px; display: block; margin-left: 16px; padding: 12px 22px; text-decoration:none;">
            Reset Password
        </a>
    </td>
@endsection