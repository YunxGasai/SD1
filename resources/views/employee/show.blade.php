@extends('layouts.app')

@section('title', $conference['title'])

@section('content')
    <h1>{{ $conference['title'] }}</h1>

    <p>{{ __('conference.description') }}: {{ $conference['description'] }}</p>
    <p>{{ __('conference.lecturers') }}: {{ $conference['lecturers'] }}</p>
    <p>{{ __('conference.date') }}: {{ $conference['date'] }}</p>
    <p>{{ __('conference.time') }}: {{ $conference['time'] }}</p>
    <p>{{ __('conference.address') }}: {{ $conference['address'] }}</p>

    <h2>{{ __('conference.attendees_title') }}</h2>

    @if (count($registrations) == 0)
        <p>{{ __('conference.no_attendees') }}</p>
    @else
        <table class="table table-bordered bg-white" style="max-width:500px">
            <tr>
                <th>{{ __('conference.name_col') }}</th>
                <th>{{ __('conference.email_col') }}</th>
            </tr>
            @foreach ($registrations as $r)
                <tr>
                    <td>{{ $r['name'] }}</td>
                    <td>{{ $r['email'] }}</td>
                </tr>
            @endforeach
        </table>
    @endif

    <p><a href="{{ route('employee.index') }}">{{ __('conference.back_to_list') }}</a></p>
@endsection
