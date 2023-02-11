@extends('errors::minimal')

@section('title', __('Not Found'))
@section('img', __(asset('../assets/img/pages/error/404.svg')))
@section('code', '404')
@section('message', __('Oops, Page not found!'))
