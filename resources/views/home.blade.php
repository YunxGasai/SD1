@extends('layouts.app')

@section('title', __('messages.main_heading'))

@section('content')
    <h1>{{ __('messages.main_heading') }}</h1>

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ __('messages.bootstrap_hint') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <h2>{{ __('messages.student_block_title') }}</h2>
    <ul>
        <li>{{ __('student.first_name') }}</li>
        <li>{{ __('student.last_name') }}</li>
        <li>{{ __('student.group_label') }}</li>
    </ul>

    <h2>{{ __('messages.subsystems_title') }}</h2>
    <ul>
        <li><a href="{{ route('client.index') }}">{{ __('messages.link_client') }}</a></li>
        <li><a href="{{ route('employee.index') }}">{{ __('messages.link_employee') }}</a></li>
        <li><a href="{{ route('admin.dashboard') }}">{{ __('messages.link_admin') }}</a></li>
    </ul>
@endsection
