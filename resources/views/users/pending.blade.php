@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar')
@endsection

{{-- users pending list START --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h1>List of pending users</h1>
                    <a href="{{route('users')}}" class="btn btn-danger" type="button">Back</a>
                </div>
                <div class="card-body">
                @if (count($pending_users) > 0)
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Club ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach ($pending_users as $user)
                            <tr>

                                <th scope="row">{{$loop->index + 1}}</th>
                                <td>{{$user->club_id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->mobile}}</td>
                                <td>{{$user->user_approved == '0' ? 'pending' : 'approved' }}</td>
                                <td class="d-flex">
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a class="btn btn-success pl-3" type="button">Approve</a>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                @else
                      <div class="text-center">
                        <span class="text-danger">No users to show!</span>
                      </div>
                </div>

                @endif
            </div>
        </div>
    </div>
</div>
@endsection

{{-- users pending list END --}}
