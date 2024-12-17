@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar')
@endsection


@section('content')
<div class="container mt-3">
            
            
  
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong class="text-dark">{{session()->get('success')}}!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong class="text-dark">{{session()->get('error')}}!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            

            <form method="GET" action="{{ route('admin.searchUser') }}" class="mb-4">
              <div class="row">
                  <div class="col-md-10">
                      <input type="text" name="search" class="form-control" placeholder="Search by Name" value="{{ request('search') }}">
                  </div>
                  <div class="col-md-2">
                      <button type="submit" class="btn btn-primary">Search</button>
                  </div>
              </div>
          </form>


    <h2><b>Pending User</b></h2>
    <table class="table table-bordered table-sm">
      <thead class="table-success">
        <tr>
          <th>Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Division</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user=>$users)
        <tr>
          <td>{{$users->name}}</td>
          <td>{{$users->mobile}}</td>
          <td>{{$users->email}}</td>
          <td>{{$users->division}}</td>
          <td>
            <a class="btn btn-success" href="{{route('admin.approvedUser',$users->id)}}">Approved</a>
            <a class="btn btn-primary" href="{{route('admin.updateUser',$users->id)}}">Update</a>
            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal">
              Delete
          </a>                                  
            <!-- The Modal -->
            <div class="modal" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">
            
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Delete User</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                      Are you sure?
                  </div>
            
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                    <a class="btn btn-danger" href="{{route('admin.deleteUser',$users->id)}}">Delete</a>
                  </div>                                                    
                </div>
              </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection