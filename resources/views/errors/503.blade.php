@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('img', __('../../../assets/img/pages/error/500.svg'))
@section('code', '503')
@section('message', __('Service Unavailable'))
