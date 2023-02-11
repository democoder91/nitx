@extends('emails.email_layout')
@section('title', 'Introduction')
@section('sub-title', '')
@section('img', 'https://nitx-mail-assets.s3.me-south-1.amazonaws.com/illustrations/PNG/Artboard+3.png')

@section('massage')
The body of your message.                               
@component('mail::button', ['url' => ''])
Button Text
@endcomponent
@endsection