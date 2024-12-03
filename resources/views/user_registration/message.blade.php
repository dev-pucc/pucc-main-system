
<!-- session message -->

@if (Session::has('success'))
    <div class="alert alert-dismissible fade show shadow-sm border-0 rounded-3 py-4" role="alert" style="background-color:  #4CAF50; color: #FFFFFF; font-size: 1.25rem;">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif (Session::has('error'))
    <div class="alert alert-dismissible fade show shadow-sm border-0 rounded-3 py-4" role="alert" style="background-color: #d32f2f; color: #ffffff; font-size: 1.25rem;">
        {{ Session::get('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
