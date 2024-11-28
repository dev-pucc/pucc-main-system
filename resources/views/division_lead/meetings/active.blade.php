<div class="container">
    <h4>Active Meeting</h4>
    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Meetings Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Meeting Name</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($meetings as $meeting)
                @if($meeting->status == 1)
                <tr>
                    <td>{{ $meeting->meeting_name }}</td>
                    <td>{{ $meeting->created_at }}</td>
                    <td>
                        @if ($meeting->status == 1)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Terminated</span>
                        @endif
                    </td>
                    <td>
                        @if ($meeting->status == 1)
                            <!-- Terminate Button -->
                            <form action="{{ route('meetings.terminate', $meeting->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to terminate this meeting?');">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Terminate</button>
                            </form>
                        @else
                            <button class="btn btn-secondary btn-sm" disabled>Terminated</button>
                        @endif
                    </td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>