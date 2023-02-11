@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('img', __('../../../assets/img/pages/error/500.svg'))
@section('code', '429')
@section('message', __('Too Many Requests'))
