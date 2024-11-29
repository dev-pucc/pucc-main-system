@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')


<!-- add custom style for printing -->
<style>
    #profile-card {
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        border-radius: 15px;
    }
    @media print {
        body * {
            visibility: hidden;
        }
        #profile-card, #profile-card * {
            visibility: visible;
        }
        #profile-card {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            border: 1px solid #000; 
        }
        .no-print {
            display: none !important;
        }
    }
</style>




<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-9 col-md-10">

            <div class="card shadow-lg border border-dark" id="profile-card" style="min-height: 500px; background-color: #f7f9fc; border-radius: 15px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);">
              
              
              
              
                <div class="card-header text-center bg-dark text-white" style="border-radius: 15px 15px 0 0;">
                    <img src="https://puc.ac.bd/Content/new-template-assets/images/puc_logo.png" alt="PUC Logo" class="mb-3" style="width: 160px;">
                    <h1 class="mb-0" style="font-size: 2rem;">Premier University, Chittagong</h1>
                    <hr style="border: none; height: 2px; background-color: #28917f; width: 50%; margin: 10px auto;">
                    <h2 class="mb-0" style="font-size: 2.5rem;">{{$user->name}}'s Profile</h2>
                </div>




                <!-- Profile Card Body -->
                <div class="card-body p-5">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" style="font-size: 1.5rem;">
                            <tbody>


                                <tr>
                                    <th class="text-end pe-4 bg-light" style="color: #333;">Name:</th>
                                    <td class="text-start ps-4 bg-white" style="color: #333;">{{ $user->name }}</td>
                                </tr>


                                <tr>
                                    <th class="text-end pe-4 bg-light" style="color: #333;">Club ID:</th>
                                    <td class="text-start ps-4 bg-white" style="color: #333;">{{ $user->club_id }}</td>
                                </tr>


                                <tr>
                                    <th class="text-end pe-4 bg-light" style="color: #333;">Email:</th>
                                    <td class="text-start ps-4 bg-white" style="color: #333;">{{ $user->email }}</td>
                                </tr>


                                <tr>
                                    <th class="text-end pe-4 bg-light" style="color: #333;">Mobile:</th>
                                    <td class="text-start ps-4 bg-white" style="color: #333;">{{ $user->mobile }}</td>
                                </tr>


                                <tr>
                                    <th class="text-end pe-4 bg-light" style="color: #333;">Division:</th>
                                    <td class="text-start ps-4 bg-white" style="color: #333;">{{ $user->division }}</td>
                                </tr>


                            </tbody>
                        </table>
                    </div>



                    <div class="d-flex justify-content-end mt-4">

                        <!-- user edit and print button -->
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success btn-lg me-3 no-print">Edit Profile</a>
                        <button class="btn btn-outline-dark btn-lg no-print" onclick="printProfile()">Print</button>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function printProfile() {
        window.print();
    }
</script>



@endsection
