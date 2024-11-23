@extends('layouts.app')


@section('navbar')
    @include('layouts.navbar')
@endsection


<<<<<<< HEAD
{{-- user edit START --}}
=======
<!-- user edit START -->
>>>>>>> upstream/main
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Edit User</h1>
                </div>

                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="club_id">Club ID</label>
                            <input type="text" name="club_id" id="club_id" class="form-control"
                                   value="{{ old('club_id', $user->club_id) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                   value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" name="mobile" id="mobile" class="form-control"
                                   value="{{ old('mobile', $user->mobile) }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                        <a href="{{ route('users') }}" class="btn btn-secondary mt-3">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
<<<<<<< HEAD
{{-- user edit END --}}
=======
<!-- user edit END -->
>>>>>>> upstream/main
