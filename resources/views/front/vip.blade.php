@extends('layouts.front')
@section('content')
<div class="container marketing"> 
    <div class="row">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
           
            @for ($i = 0 ; $i<=8 ; $i++)
            <div class="col rounded">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: صورة مصغرة"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%"
                            fill="#eceeef" dy=".3em">تست</text>
                    </svg>

                    <div class="card-body">
                        <p class="card-text ">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان
                            گرافیک است.</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">مشاهده</button>
                            </div>
                            <small class="text-muted">5/3/1399</small>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>
    
@endsection