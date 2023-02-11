@extends('emails.email_layout')
@section('title', 'Summary of Your Ad')
@section('sub-title', '')
@section('img', 'https://nitx-mail-assets.s3.me-south-1.amazonaws.com/illustrations/PNG/Artboard+12.png')

@section('massage')


Hello {{ $ad->advertiser->name }} <br>

Ad name: {{ $ad->name }} <br>
Ad date: {{ $ad->screens[0]->pivot->from }} - {{ $ad->screens[0]->pivot->to }} <br>
Ad category: {{ $ad->categories[0]->category }} <br>
@php
$from = new DateTime($ad->screens[0]->pivot->from);
$to = new DateTime($ad->screens[0]->pivot->to);
$interval = $from->diff($to)->format('%r%a') + 1;
@endphp
Interval: {{ $interval }} Days<br>

Screens: <br>
@for ($i = 0; $i < $ad->screens->count(); $i++)
{{ $i + 1 }}. {{ $ad->screens[$i]->name }} <br>
@endfor



The total cost: {{ $ad->screens->count() * 33 * $interval }} SAR <br>

Riyad Bank <br>
شركة البرق الازرق لتقنية المعلومات<br>
Account Number: 3213398369940 <br>
IBAN: SA9020000003213398369940 <br>

@endsection


                                

                            
                            
