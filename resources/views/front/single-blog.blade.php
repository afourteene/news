@extends('layouts.front')
@section('content')
    <div class="container marketing mt-5 ">

        <!-- Three columns of text below the carousel -->
        <div class="row pt-5">

            <div class="col-md-4 ">
                <div class="row row-cols-1">
                    <h3>جدید ترین</h3>
                    @foreach ($news as $new)
                        <div class="bg-secondary rounded side-bar-item">
                            <a class="text-decoration-none text-dark m-auto"href="{{ route('show-blog', $new->id) }}">{{ $new->title }}</a>
                        </div>
                    @endforeach

                </div>
                <div class="row row-cols-1">
                    <h3>محبوب ترین</h3>
                    @foreach ($favPosts as $fav)
                        <div class="bg-secondary rounded side-bar-item">
                          <a class="text-decoration-none text-dark m-auto" href="{{ route('show-blog', $fav->post->id) }}">{{ $fav->post->title }}</a>
                        </div>
                    @endforeach
                </div>
                <div class="row row-cols-1">
                    <h3>ویژه</h3>
                    @foreach ($vipPosts as $vipPost)
                        <div class="bg-secondary rounded side-bar-item">
                          <a class="text-decoration-none text-dark m-auto" href="{{ route('show-blog', $vipPost->id) }}">{{ $vipPost->title }}</a>
                        </div>
                    @endforeach

                </div>

            </div>



            <div class="col-md-8">
                <div class="card mb-3">
                    <img src="{{ url('uploads/' . $post->image->url) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h2 class="card-title mt-4">{{ $post->title }}</h2>
                        <hr>

                        <p class="mt-4 ">{{ $post->body }}</p>
                        <div class="tags mt-4">
                            @foreach ($post->tags as $tag)
                                <span class="mx-1"
                                    style="border-radius: 5px; background-color: #eeee; width:fit-content; padding: 0 auto">{{ $tag->name }}</span>
                            @endforeach

                        </div>

                        <p class="text-right card-text mt-4">
                            تاریخ :
                            <small class="text-muted">{{ Verta::instance($post->created_at)->formatWord('d F ') }}</small>
                        </p>
                        <div class="d-flex flex-row-reverse">
                            <div class="p-2">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    ثبت نظر
                                </button>
                            </div>
                            <div class="p-2"><a class="btn "
                                    href="{{ route('store-like', $post->id) }}">{{  $like->likes  }} : <i
                                        class="bi bi-hand-thumbs-up"></i> </a></div>
                        </div>

                    </div>

                </div>
                @include('partials.alert')

                <!-- comments -->
                @if (!is_null($comments))

                    @foreach ($comments as $comment)
                        <div class="card mt-3">
                            <div class="card-header">
                                {{ $comment->author }}
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p>{{ $comment->comment }}</p>
                                </blockquote>
                            </div>
                        </div>

                    @endforeach
            </div>
            @endif
            @include('partials.validation-errors')
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ثبت نظر</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('store-comment', $post->id) }}">
                            <div class="modal-body">

                                @csrf
                                <div class="mb-3">
                                    <label for="fullname" class="col-form-label">نام و نام خانوادگی :</label>
                                    <input type="text" class="form-control" id="fullname" name="fullname">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="col-form-label">ایمیل :</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="comment" class="col-form-label">نظر شما :</label>
                                    <textarea class="form-control" name="comment" id="comment" cols="30"
                                        rows="5"></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                                <button type="submit" class="btn btn-success">ثبت</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
