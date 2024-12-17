@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h3 class="card-header"><b>Update User</b></h3>
                    <div class="card-body card">


                        
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

                        
                        
                        <form action="{{ route('admin.updateUserPost',$user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="col-12">
                                <label for="name"><b>Name:</b></label>
                                <input type="text" placeholder="Name" class="form-control" value="{{ $user->name }}" id="name" name="name">
                            </div>
                            <div class="col-12">
                                <label for="mobile"><b>Mobile Number:</b></label>
                                <input type="text" placeholder="Mobile Number" class="form-control" value="{{ $user->mobile }}" id="mobile" name="mobile">
                            </div>
                            <div class="col-12">
                                <label for="email"><b>Email:</b></label>
                                <input type="email" placeholder="Email" class="form-control" value="{{ $user->email }}" id="email" name="email">
                            </div>
                            <div class="col-12 mb-2">
                                <label for="division"><b>Division:</b></label>
                                <select class="form-select" id="division" name="division">
                                    <option>Select Division</option>
                                    <option @if ($user->division = "competitive_programming")selected @endif value="competitive_programming" >Competitive Programming</option>
                                    <option @if ($user->division = "deep_learning")selected @endif value="deep_learning" >Deep Learning</option>
                                    <option @if ($user->division = "devops")selected @endif value="devops" >DevOps</option>
                                    <option @if ($user->division = "networking")selected @endif value="networking" >Networking</option>
                                    <option @if ($user->division = "gaming")selected @endif value="gaming" >Gaming</option>
                                    <option @if ($user->division = "development")selected @endif value="development" >Development</option>
                                </select>
                            </div>
                            <div class="col-12 d-grid mx-auto">
                                <button type="submit" class="btn btn-success" name="btnCreate">Update User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>        
    </div>   

@endsection