<!doctype html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>{{ __('auth.login') }}</title>


    <link rel="icon" type="image/png" href="{{ asset('admin/assets/img/fav-ico.png') }}">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('admin/assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('admin/assets/dist/css/custom.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container-fluid">


        <div class="row">
            <div class="col-md-4 center ">
                <div class="box ">

                    <div class="text-center logo mx-auto">
                        <img src="{{ asset('admin/assets/img/Azaduni-logo-LimooGraphic.png') }}" class="rounded img"
                            alt="logo">
                    </div>

                    <form class="mt-4 login" action="{{ route('do-login') }}" method="POST">
                        @csrf
                        <div class="col-sm-7 mx-auto ">

                            <label for="Emailinput" class="form-label text-right">ایمیل</label>
                            <input type="text" class="form-control " id="Emailinput"
                                placeholder=" ایمیل خود را وارد کنید " name='email'>
                        </div>
                        <div class="col-sm-7 mx-auto">
                            <label for="Passwordinput" class="form-label">رمز عبور</label>
                            <input type="password" class="form-control" id="Passwordinput"
                                placeholder="رمز عبور خود را وارد کنید" name="password">

                        </div>
                        <div class="col-sm-7 d-grid  mx-auto  mt-3">
                            <button class="btn btn-primary" type="submit">ورود</button>
                        </div>




                    </form>
                    <!--action alert -->
                    @include('partials.alert')



                    <!--validation errors -->
                    @include('partials.validation-errors')
                    <div class="col-sm-7  mx-auto text-center mt-4">
                        <a class="link-signin" href="{{ route('register') }}">هنوز عضو سایت نشدی؟ بزن بریم</a>
                        <a class="link-resetpass" href="#">کلمه عبور خود را فراموش کرده اید؟</a>

                    </div>


              



                </div>

            </div>
        </div>


    </div>



    <script src="{{ asset('admin/assets/dist/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
