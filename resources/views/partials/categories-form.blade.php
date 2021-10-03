<span class="create-post"><a class="btn btn-primary" href="{{ route('dashboard') }}" role="button">بازگشت</a></span>
<h1 class="h2">دسته بندی ها</h1>
<form class="row g-3" method="POST" action="{{ route('store-categories') }}">
    @csrf
    <div class="col-auto">
      <label for="category" class="visually-hidden">دسته بندی</label>
      <input type="text" class="form-control" id="category" placeholder="دسته بندی" name="category">
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-success mb-3">ایجاد</button>
    </div>
  </form>
<div class="row mt-3">

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">شماره</th>
                    <th scope="col">دسته بندی</th>
                    <th scope="col">تنظیمات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category )
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $category->name }}</td>
                    <td>@include('partials.btn-cat-modal')</td>
                </tr>
                @include('partials.cat-modal-form')    

                @endforeach




            </tbody>
        </table>
    </div>


    @include('partials.alert')

    @include('partials.validation-errors')



</div>
