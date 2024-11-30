@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">All Notices</h2>
    <div class="row">
        @foreach($notices as $notice)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $notice->title }}</h5>
                        <p class="card-text">
                            {{ \Illuminate\Support\Str::limit($notice->content, 100, '...') }}
                        </p>
                        <p class="text-muted small">{{ $notice->date }}</p>
                        <a href="{{ route('notice.show', $notice->id) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
