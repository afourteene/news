@if ($errors->any())
    
<div class="col-sm-7 d-grid  mx-auto  mt-3">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            
            @endforeach

        <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
</div>

@endif