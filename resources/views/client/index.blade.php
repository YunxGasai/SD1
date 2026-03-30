@extends('layouts.app')

@section('title', __('conference.client_page_title'))

@section('content')
    <h1>{{ __('conference.list_title') }}</h1>

    <table class="table table-bordered bg-white" style="max-width:700px">
        <tr>
            <th>{{ __('conference.title_col') }}</th>
            <th>{{ __('conference.date_col') }}</th>
            <th>{{ __('conference.actions_col') }}</th>
        </tr>
        @foreach ($conferences as $c)
            <tr>
                <td>{{ $c['title'] }}</td>
                <td>{{ $c['date'] }}</td>
                <td>
                    <a href="{{ route('client.conferences.show', $c['id']) }}">{{ __('conference.view') }}</a>
                    |
                    <a href="{{ route('client.conferences.register', $c['id']) }}">{{ __('conference.register_link') }}</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
