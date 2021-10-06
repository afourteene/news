@extends('layouts.front')


@section('content')


@include('partials.front-slider')


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">




        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
           
            @foreach ($posts as $post)
            <div class="col rounded">
                <div class="card shadow-sm">
                    <img src="{{ url('uploads/'.$post->image->url) }}" style="width: 417px; height=225px;g" alt="">
                        <title>{{ $post->title }}</title>
                        <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%"
                            fill="#eceeef" dy=".3em">{{ $post->title }}</text>
                    </svg>

                    <div class="card-body">
                        <p class="card-text ">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان
                            گرافیک است.</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('show-post',$post->id) }}" type="button" class="btn btn-sm btn-outline-secondary">مشاهده</a>
                            </div>
                            <small class="text-muted">{{ Verta::instance($post->created_at)->formatWord('d F ') }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>




@endsection