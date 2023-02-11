@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('img', __('../../../assets/img/pages/error/403.svg'))
@section('code', '401')
@section('message', __('Unauthorized'))
