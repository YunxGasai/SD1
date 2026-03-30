@extends('layouts.app')

@section('title', $pageTitle)

@section('content')
    <h1>{{ $pageTitle }}</h1>
    <p>{{ __('messages.placeholder_body') }}</p>
@endsection
