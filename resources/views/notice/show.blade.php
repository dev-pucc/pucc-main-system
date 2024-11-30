@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Main Notice Content -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $notice->title }}</h3>
                    <p class="text-muted">{{ $notice->date }}</p>
                    <p class="card-text">{{ $notice->content }}</p>
                </div>
            </div>
        </div>

        <!-- Other Notices -->
        <div class="col-md-4">
            <h4>Other Notices</h4>
            <ul class="list-group">
                @foreach($otherNotices as $otherNotice)
                    <li class="list-group-item">
                        <a href="{{ route('notice.show', $otherNotice->id) }}">
                            {{ $otherNotice->title }}
                        </a>
                        <p class="text-muted small mb-0">{{ $otherNotice->date }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
