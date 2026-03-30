@extends('layouts.app')

@section('title', __('conference.register_title'))

@section('content')
    <h1>{{ __('conference.register_title') }}</h1>
    <p>{{ $conference['title'] }}</p>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif

    <form method="post" action="{{ route('client.conferences.register.store', $conference['id']) }}">
        @csrf
        <p>
            <label>{{ __('conference.field_name') }}<br>
                <input type="text" name="name" value="{{ old('name') }}" required>
            </label>
        </p>
        <p>
            <label>{{ __('conference.field_email') }}<br>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </label>
        </p>
        <p>
            <button type="submit">{{ __('conference.register_submit') }}</button>
        </p>
    </form>

    <p><a href="{{ route('client.conferences.show', $conference['id']) }}">{{ __('conference.back_to_list') }}</a></p>
@endsection
