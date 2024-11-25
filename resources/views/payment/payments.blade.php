@extends('layouts.app')

@section('navbar')

    @include('layouts.navbar')
    
@endsection

@section('content')


<!-- Error/Succes_message_handling START-->

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

<!-- Error/Succes_message_handling END-->




<!--All_payment_form_links START-->
    <div class="container my-3">
        <div class="d-flex justify-content-center">
        <a class="nav-link mx-3" href="{{ url('/payment/cp') }}">Computer Club Payment</a>
<a class="nav-link mx-3" href="{{ url('/payment/deeplearning') }}">Deep Learning Club Payment</a>
<a class="nav-link mx-3" href="{{ url('/payment/development') }}">Development Club Payment</a>
<a class="nav-link mx-3" href="{{ url('/payment/devops') }}">DevOps Club Payment</a>
<a class="nav-link mx-3" href="{{ url('/payment/gaming') }}">Gaming Club Payment</a>
<a class="nav-link mx-3" href="{{ url('/payment/networking') }}">Networking Club Payment</a>
        </div>
    </div>

<!--All_payment_form_links END-->

<!-- Search_by_id START-->
<div class="d-flex justify-content-center mt-5">
    <form action="{{ route('payments.show') }}" method="GET" class="d-flex">
        <div class="input-group">
            <input 
                type="search" 
                name="student_id" 
                class="form-control rounded" 
                placeholder="Enter Student ID" 
                aria-label="Search" 
                aria-describedby="search-addon"
            />
            <button type="submit" class="btn btn-outline-primary">Search</button>
        </div>
    </form>
</div>
<!-- Search_by_id END-->


<!-- Payment_table START-->
 
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center"><span>Payment History</span>
                
                <a href="{{ route('payments.index') }}" class="btn btn-primary">Show All</a>
</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Payment ID</th>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Club Name</th>
                                <th>Amount</th>
                                <th>Payment Date</th>
                                <th> Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $payment)
                            <tr>
                                <td>{{ $payment->id }}</td>
                                <td>{{ $payment->student_id }}</td>
                                
                                <td>{{$payment->name }}</td>
                                <td>{{ $payment->email }}</td>
                                <td>{{ $payment->phone }}</td>
                                <td>{{ $payment->club }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->payment_date }}</td>
                                <td>
                                        <!-- Update Button -->
                                        <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning ">Edit</a>
                                 
                                       
                                </td>
                                <td>
                                     <!-- Delete Form -->
                                     <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline;">
                                     @csrf
                                     @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm " onclick="return confirm('Are you sure you want to delete this transaction?')">Delete</button>
                                        </form>
                                </td>
                            
                            </tr>
                        @endforeach

                        </tbody>
</table>
</div>
</div>
</div>
</div>



@endsection