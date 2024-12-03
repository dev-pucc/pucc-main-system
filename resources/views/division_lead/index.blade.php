@extends('layouts.app')

@section('navbar')

    @include('layouts.navbar')
    
@endsection

@section('content')

    <!-- Page Content -->
    <div class="container mt-5">
        <h1 align="center">Welcome to the Division Lead End</h1><hr>
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong class="text-dark">{{session()->get('success')}}!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        <div class="container mt-5">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="{{ route('meetings.index') }}" class="nav-link active">Attendance Tracker</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Curriculum Resource
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('ai') }}">Artificial Intelligence</a></li>
                        <li><a class="dropdown-item" href="{{ route('devops') }}">DevOps</a></li>
                        <li><a class="dropdown-item" href="{{ route('dl') }}">Deep Learning</a></li>
                        <li><a class="dropdown-item" href="{{ route('gaming') }}">Gaming</a></li>
                        <li><a class="dropdown-item" href="{{ route('networking') }}">Networking</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- Include Attendance -->
    @include('division_lead.meetings.attendance')


@endsection