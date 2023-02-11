@extends('emails.email_layout')
@section('title', 'New Screen')
@section('sub-title', '')
@section('img', 'https://nitx-mail-assets.s3.me-south-1.amazonaws.com/illustrations/PNG/Artboard+8.png')

@section('massage')
You have added new screen Screen name:
{{$screen}}
@endsection