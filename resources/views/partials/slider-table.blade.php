<span class="create-post"><a class="btn btn-primary" href="{{ route('dashboard') }}" role="button">بازگشت</a></span>
<span class="create-post" data-bs-toggle="modal" data-bs-target="#modal-create"><button class="btn btn-success mx-2"  role="button">ایجاد</button></span>
<h1 class="h2">اسلایدر</h1>
<div class="row">

@include('partials.slider-modal-create-form')
    <div class="table-responsive">

      
            @if ($sliders->count() !=  0)
                
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">شماره</th>
                    <th scope="col">نام</th>
                    <th scope="col">تنظیمات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $slider )
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $slider->name }}</td>
                    <td>@include('partials.btn-slider-modal')</td>
                </tr>
                @include('partials.slider-modal-update-form')    

                @endforeach

            </tbody>
        </table>
        @endif
    </div>

</div>
@include('partials.alert')
@include('partials.validation-errors')