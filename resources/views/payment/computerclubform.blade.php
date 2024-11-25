@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Computer Club Payment Form</h2>

    <div class="container mt-4">
    <!-- Display success/error alerts -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif








    <form action="{{ route('payments.store') }}" method="POST" class="mt-4">
        @csrf
        <!-- ID Field -->
        <div class="mb-3">
            <label for="id" class="form-label"> Student ID</label>
            <input type="text" class="form-control" id="id" name="student_id" placeholder="Enter your ID" required>
        </div>
        
        <!-- Name Field -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
        </div>
        
        <!-- Email Field -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>
        
        <!-- Phone Field -->
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
        </div>

        <div class="mb-3">
    <label for="amount" class="form-label">Amount</label>
    <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter the payment amount" required>
    </div>
    <div class="mb-3">
    <label for="payment_date" class="form-label">Payment Date</label>
    <input type="date" class="form-control" id="payment_date" name="payment_date" required>
    </div>

    <input type="hidden" name="club" value="computer club">
        
        
  
        
        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit Payment</button>
        </div>
    </form>
</div>
@endsection
