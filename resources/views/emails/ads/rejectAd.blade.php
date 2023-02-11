@extends('emails.email_layout')
@section('title', 'Your Ad is rejected')
@section('sub-title', '')
@section('img', 'https://nitx-mail-assets.s3.me-south-1.amazonaws.com/illustrations/PNG/Artboard+2.png')

@section('massage')
Hello {{$ad->advertiser->name}}
Ad name: {{$ad->name}} <br>
Reason: {{$reason}}
@endsection
