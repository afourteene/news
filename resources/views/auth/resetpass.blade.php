<!doctype html>
<html lang="fa">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.87.0">
  <title>{{ __('auth.reset pass') }}</title>


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
            <img src="./assets/img/Azaduni-logo-LimooGraphic.png" class="rounded img " alt="logo">
          </div>

          <form class="mt-1 " action="#" method="POST">


            <div class="col-sm-7 mx-auto">
              <label for="password" class="form-label">رمز عبور</label>
              <input type="password" class="form-control" id="password" placeholder="رمز عبور خود را وارد کنید"
                name="password">
            </div>
            <div class="col-sm-7 mx-auto">
              <label for="password-confirm" class="form-label">تکرار رمز عبور</label>
              <input type="password" class="form-control" id="password-confirm" placeholder="تکرار رمز عبور "
                name="password_confirmation">
            </div>

            <div class="col-sm-7 d-grid  mx-auto  mt-3">
              <button class="btn btn-success" type="button">تغییر رمز عبور</button>
            </div>




          </form>

        </div>

      </div>
    </div>


  </div>





  </script>



</body>

</html>