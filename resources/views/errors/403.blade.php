@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('img', __('../../../assets/img/pages/error/403.svg'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
