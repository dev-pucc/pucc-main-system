@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Registration Form</h2>

                    <!-- Include message file for success and error message -->
                    @include('user_registration.message')

                    <form id="registrationForm" action="{{ route('user_registration.registerProcess') }}" method="POST">
                        <!-- Added CSRF token -->
                        @csrf

                        <!-- Name field -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" value="{{ old('name') }}" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter your name">
                            @error('name')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Student ID field -->
                        <div class="mb-3">
                            <label for="club_id" class="form-label">Student ID</label>
                            <input type="text" value="{{ old('club_id') }}" class="form-control form-control-lg @error('club_id') is-invalid @enderror" name="club_id" id="club_id" placeholder="Enter your ID">
                            @error('club_id')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email field -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" value="{{ old('email') }}" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter your email">
                            @error('email')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Mobile field -->
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" value="{{ old('mobile') }}" class="form-control form-control-lg @error('mobile') is-invalid @enderror" name="mobile" id="mobile" placeholder="Enter your mobile number">
                            @error('mobile')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Role dropdown -->
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select form-select-lg @error('role') is-invalid @enderror" name="role" id="role">
                                <option disabled selected>Select Role</option>
                                <option {{ old('role') == 'user' ? 'selected' : '' }} value="user">User</option>
                                <option {{ old('role') == 'division_lead' ? 'selected' : '' }} value="division_lead">Division Lead</option>
                                <option {{ old('role') == 'treasurer' ? 'selected' : '' }} value="treasurer">Treasurer</option>
                                <option {{ old('role') == 'recruitment_officer' ? 'selected' : '' }} value="recruitment_officer">Recruitment Officer</option>
                                <option {{ old('role') == 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                                <option {{ old('role') == 'secretary' ? 'selected' : '' }} value="secretary">Secretary</option>
                            </select>
                            @error('role')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Division dropdown -->
                        <div class="mb-3">
                            <label for="division" class="form-label">Division</label>
                            <select class="form-select form-select-lg @error('division') is-invalid @enderror" id="division" name="division">
                                <option disabled selected>Select Division</option>
                                <option {{ old('division') == 'competitive_programming' ? 'selected' : '' }} value="competitive_programming">Competitive Programming</option>
                                <option {{ old('division') == 'deep_learning' ? 'selected' : '' }} value="deep_learning">Deep Learning</option>
                                <option {{ old('division') == 'devops' ? 'selected' : '' }} value="devops">DevOps</option>
                                <option {{ old('division') == 'networking' ? 'selected' : '' }} value="networking">Networking</option>
                                <option {{ old('division') == 'gaming' ? 'selected' : '' }} value="gaming">Gaming</option>
                                <option {{ old('division') == 'development' ? 'selected' : '' }} value="development">Development</option>
                            </select>
                            @error('division')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password field -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter your password">
                            @error('password')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Button for submit form -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirm Your Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Name:</strong> <span id="confirmName"></span></p>
                <p><strong>Student ID:</strong> <span id="confirmStudentId"></span></p>
                <p><strong>Email:</strong> <span id="confirmEmail"></span></p>
                <p><strong>Mobile:</strong> <span id="confirmMobile"></span></p>
                <p><strong>Role:</strong> <span id="confirmRole"></span></p>
                <p><strong>Division:</strong> <span id="confirmDivision"></span></p>
            </div>
            <div class="modal-footer">
                <button id="confirmButton" type="button" class="btn btn-success">Yes, Proceed</button>
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Update Information</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('registrationForm');
        const confirmButton = document.getElementById('confirmButton');
        const modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            document.getElementById('confirmName').textContent = document.getElementById('name').value;
            document.getElementById('confirmStudentId').textContent = document.getElementById('club_id').value;
            document.getElementById('confirmEmail').textContent = document.getElementById('email').value;
            document.getElementById('confirmMobile').textContent = document.getElementById('mobile').value;
            document.getElementById('confirmRole').textContent = document.getElementById('role').options[document.getElementById('role').selectedIndex].text;
            document.getElementById('confirmDivision').textContent = document.getElementById('division').options[document.getElementById('division').selectedIndex].text;

            modal.show();
        });
        confirmButton.addEventListener('click', function () {
            form.submit(); 
        });
    });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
