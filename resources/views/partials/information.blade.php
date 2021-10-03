
<h1 class="h2">اطلاعات</h1>
<div class="d-flex justify-content-end">
    <img src="{{ !is_null($profileImage) ? url("uploads/$profileImage->url") : asset('admin/assets/img/profile.png') }}"
        class="img-thumbnail rounded-circle profile-img " alt="profile">
</div>


<div class="row">
    <div class="col-md-12">
        <form class="row g-3" action="{{ route('info-update', $user->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="fullname" class="form-label">نام و نام خانوادگی:</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="{{ $user->fullname }}">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">ایمیل:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>

            <div class="col-md-6">
                <label for="password" class="form-label">رمزعبور:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="col-md-6">
                <label for="password-confirm" class="form-label">تکرار رمز عبور:</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
            </div>
            @if (Auth::user()->role == 'admin')
                <div class="col-md-12">
                    <select class="form-select" aria-label="Default select example" name="user">
                        <option {{ $user->role == 'admin' ? 'selected' : '' }} value="admin">ادمین</option>
                        <option {{ $user->role == 'support' ? 'selected' : '' }} value="support">پشتیبان</option>
                        <option {{ $user->role == 'author' ? 'selected' : '' }} value="author">نویسنده</option>
                    </select>
                </div>
            @endif

            <div class="mb-3">
                <label for="formFile" class="form-label">عکس پروفایل:</label>
                <input class="form-control" type="file" id="formFile" name="image">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">ذخیره</button>
                <a class="btn btn-secondary" href="{{ route('dashboard') }}" role="button">بازگشت</a>
            </div>
        </form>

    </div>
</div>
@include('partials.alert')
@include('partials.validation-errors')
