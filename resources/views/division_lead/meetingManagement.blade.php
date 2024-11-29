@extends('layouts.app')

@section('navbar')

    @include('layouts.navbar')
    
@endsection

@section('content')

    <!-- Page Content -->
    <div class="container mt-5">
        <h1 align="center">Welcome to the Attendance Tracker</h1><hr><br>
    </div>

    <div class="container mt-5">
        <h1 align="center">Meetings Management</h1>

        <!-- Include create meeting -->
        @include('division_lead.meetings.create')   

        <!-- Include active meeting -->
        @include('division_lead.meetings.active')  

        <!-- Include devops meeting -->
        @include('division_lead.meetings.devops')

        <!-- Include devops meeting -->
        @include('division_lead.meetings.networking')

        <!-- Include ai meeting -->
        @include('division_lead.meetings.ai') 

        <!-- Include ai meeting -->
        @include('division_lead.meetings.dl')

        <!-- Include ai meeting -->
        @include('division_lead.meetings.development')  
        
        <!-- Include ai meeting -->
        @include('division_lead.meetings.gaming')  

@endsection