@extends('layouts.app')

@section('title', __('conference.employee_page_title'))

@section('content')
    <h1>{{ __('conference.employee_list_title') }}</h1>

    <table class="table table-bordered bg-white" style="max-width:800px">
        <tr>
            <th>{{ __('conference.title_col') }}</th>
            <th>{{ __('conference.date_col') }}</th>
            <th>{{ __('conference.status_col') }}</th>
            <th>{{ __('conference.actions_col') }}</th>
        </tr>
        @foreach ($conferences as $c)
            <tr>
                <td>{{ $c['title'] }}</td>
                <td>{{ $c['date'] }}</td>
                <td>
                    @if ($c['is_past'])
                        {{ __('conference.past_badge') }}
                    @else
                        {{ __('conference.planned_badge') }}
                    @endif
                </td>
                <td><a href="{{ route('employee.conferences.show', $c['id']) }}">{{ __('conference.view') }}</a></td>
            </tr>
        @endforeach
    </table>
@endsection
