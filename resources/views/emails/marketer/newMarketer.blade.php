@extends('emails.email_layout')
@section('title', 'Your Refferal Code')
@section('sub-title', '')
@section('img', 'https://nitx-mail-assets.s3.me-south-1.amazonaws.com/illustrations/PNG/Artboard+6.png')

@section('massage')
You have created your code successfully
@endsection

@section('btn')
<td style="font-size:14px; line-height:16px; text-align:center; min-width:auto !important;">
    <a href="nitx.io" target="_blank" style="color:#ffffff; background: #0010F7; border: 1px solid #0010F7; border-radius:8px; display: block; margin-left: 16px; padding: 12px 22px; text-decoration:none;">
        {{$code}}
    </a>
</td>
@endsection