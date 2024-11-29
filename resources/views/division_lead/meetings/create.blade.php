<div class="container mt-5">
    <!-- Create Meeting Button -->
    <p align="right"><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createMeetingModal">Create Meeting</button></p>
</div>

<!-- Create Meeting Modal -->
<div class="modal fade" id="createMeetingModal" tabindex="-1" aria-labelledby="createMeetingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('meetings.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createMeetingModalLabel">Create New Meeting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="meetingName" class="form-label">Meeting Name</label>
                        
                        <select class="form-control @error('meeting_name') is-invalid @enderror" id="meetingName" name="meeting_name" required>
                            <option value="">Select a meeting</option>
                            <option value="Artificial Intelligence">Artificial Intelligence</option>
                            <option value="Devops">Devops</option>
                            <option value="Gaming">Gaming</option>
                            <option value="Networking">Networking</option>
                            <option value="Development">Development</option>
                            <option value="Deep Learning">Deep Learning</option>
                        </select>
                        
                        <!-- Display Validation Error for Meeting Name -->
                        @error('meeting_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Meeting</button>
                </div>
            </form>
        </div>
    </div>
</div>
