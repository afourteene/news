@if (session('success'))
    <div class="col-sm-7 mx-auto alert alert-success alert-dismissible fade show mt-2" role="alert">
       عملیات با موفقیت انجام شد.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif

@if (session('failed'))
    <div class="col-sm-7 mx-auto alert alert-danger alert-dismissible fade show mt-2" role="alert">
        عملیات با شکست مواجه شد!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif