@extends('layouts.app')

@section('title', $conference['title'])

@section('content')
    @if (session('status'))
        <p class="text-success">{{ session('status') }}</p>
    @endif

    <h1>{{ $conference['title'] }}</h1>

    <p>{{ __('conference.description') }}: {{ $conference['description'] }}</p>
    <p>{{ __('conference.lecturers') }}: {{ $conference['lecturers'] }}</p>
    <p>{{ __('conference.date') }}: {{ $conference['date'] }}</p>
    <p>{{ __('conference.time') }}: {{ $conference['time'] }}</p>
    <p>{{ __('conference.address') }}: {{ $conference['address'] }}</p>

    <p>
        <a href="{{ route('client.conferences.register', $conference['id']) }}">{{ __('conference.register_link') }}</a>
        —
        <a href="{{ route('client.index') }}">{{ __('conference.back_to_list') }}</a>
    </p>
@endsection
