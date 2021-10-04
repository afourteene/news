<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach ( $sliders as $slider )
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{ $loop->index }}" {{ $loop->index == 0 ? "class=active" : '' }} aria-current="true" aria-label="Slide{{ $loop->index+1 }}"></button>

        @endforeach

    </div>
    <div class="carousel-inner">

        @foreach ($sliders as $slider )
        <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}" >
            <img src="{{ url("uploads/$slider->name") }}" class="img-fluid" alt="Responsive image">


            <div class="container">
                <div class="carousel-caption text-start">
                    <h1>{{ $slider->alt }}</h1>
                    <p>{{ $slider->text }}</p>
                    <p><a class="btn btn-lg btn-primary" href="{{ $slider->link }}">لینک</a></p>
                </div>
            </div>
        </div>
        @endforeach
       
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">قبلی</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">بعدی</span>
    </button>
</div>