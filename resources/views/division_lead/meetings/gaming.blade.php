<div class="container mt-5">
    <h4>Gaming</h4>

    <!-- Meetings Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Meeting Name</th>
                <th>Date</th>
                <th>Status</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($meetings as $meeting)
                @if ($meeting->meeting_name == 'Gaming')
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
                            <button 
                                class="btn btn-info btn-sm" 
                                data-bs-toggle="modal" 
                                data-bs-target="#detailsModal{{ $meeting->id }}">
                                Details
                            </button>
                        </td>
                    </tr>

                    <!-- Modal for Students -->
                    <div class="modal fade" id="detailsModal{{ $meeting->id }}" tabindex="-1" aria-labelledby="detailsModalLabel{{ $meeting->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailsModalLabel{{ $meeting->id }}">Students Attending: {{ $meeting->meeting_name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @php
                                        // Fetch students attending the meeting
                                        $students = DB::table('attended')->where('meeting_id', $meeting->id)->get();
                                    @endphp

                                    @if ($students->isEmpty())
                                        <p>No students have attended this meeting.</p>
                                    @else
                                        <ul class="list-group">
                                            @foreach ($students as $student)
                                                <li class="list-group-item">
                                                    {{ $loop->iteration }}.  {{ $student->name }} (ID: {{ $student->student_id }})
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
