<div class="container">
    <h2 class="text-center my-4">Meetings List</h2>

    @if ( $isMeetingCreated )
        <div class="list-group">
            @foreach ($isMeetingCreated as $isMeetingCreated)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $isMeetingCreated->meeting_name }}</strong> <br>
                        <small class="text-muted">Scheduled on: {{ $isMeetingCreated->created_at }}</small>
                    </div>
                    <!-- Attendance Form -->
                    <form action="{{ route('attendance.store', $isMeetingCreated->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">Mark Attendance</button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <p class="alert alert-warning">No meetings scheduled.</p>
    @endif
</div>

