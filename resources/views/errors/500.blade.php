@extends('errors::minimal')

@section('title', __('Server Error'))
@section('img', __('../../../assets/img/pages/error/502.svg'))
@section('code', '500')
@section('message', __('Server Error'))
