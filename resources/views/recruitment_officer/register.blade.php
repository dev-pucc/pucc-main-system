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


                    <!-- include message file for success and error message -->
                    @include('recruitment_officer.message')


                    <form action="{{route('recruitment_officer.registerProcess')}}" method="POST">

                        <!-- added csrf token -->
                        @csrf



                        <!-- name field -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" value="{{old('name')}}" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter your name">
                            
                            <!-- checking error for displaying error message -->
                            @error('name')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>




                        <!-- email field -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email"  value="{{old('email')}}" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter your email">
                           
                           <!-- checking error for displaying error message -->
                            @error('email')
                            <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>




                        <!-- mobile field -->
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="number" value="{{old('mobile')}}" class="form-control form-control-lg @error('mobile') is-invalid @enderror" name="mobile" id="mobile" placeholder="Enter your mobile number">
                        
                            <!-- checking error for displaying error message -->
                            @error('mobile')
                            <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>




                        <!-- role dropdown -->
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select form-select-lg @error('role') is-invalid @enderror" name="role" id="role">
                                <option disabled selected>Select Role</option>
                                <option value="user">User</option>
                                <option value="developer">Developer</option>
                                <option value="developer_lead">Division Lead</option>
                                <option value="treasurer">Treasurer</option>
                                <option value="recruitment_officer">Recruitment Officer</option>
                                <option value="admin">Admin</option>
                                <option value="secretary">Secretary</option>
                            </select>

                           <!-- checking error for displaying error message -->
                            @error('role')
                            <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                        




                        <!-- division dropdown -->
                        <div class="mb-3">
                            <label for="division" class="form-label">Division</label>
                            <select class="form-select form-select-lg @error('division') is-invalid @enderror" id="division" name="division">
                                <option disabled selected>Select Division</option>
                                <option value="competitive_programming">Competitive Programming</option>
                                <option value="deep_learning">Deep Learning</option>
                                <option value="devops">DevOps</option>
                                <option value="networking">Networking</option>
                                <option value="gaming">Gaming</option>
                                <option value="development">Development</option>
                            </select>

                            <!-- checking error for displaying error message -->
                            @error('division')
                            <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>




                        <!-- password field -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter your password">
                            
                            <!-- checking error for displaying error message -->
                            @error('password')
                            <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>




                        <!-- button for submit form -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        </div>


                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
