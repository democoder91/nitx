@extends('emails.email_layout')
@section('title', 'New AD')
@section('sub-title', '')
@section('img', 'https://nitx-mail-assets.s3.me-south-1.amazonaws.com/illustrations/PNG/Artboard+8.png')

@section('massage')
There are new ads check it please 😁
@endsection

@section('btn')
<td style="font-size:14px; line-height:16px; text-align:center; min-width:auto !important;">
    <a href="{{route("admin.index")}}" target="_blank" style="color:#ffffff; background: #0010F7; border: 1px solid #0010F7; border-radius:8px; display: block; margin-left: 16px; padding: 12px 22px; text-decoration:none;">
        Go to dashboard
    </a>
</td>
@endsection