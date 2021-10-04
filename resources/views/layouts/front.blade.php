<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>سایت خبری</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel-rtl/">



    <!-- Bootstrap core CSS -->
    <link href="{{ asset('home/assets/dist/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/dist/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>



</head>

<body>

    <!--  header -->
    @include('partials.front-header')

    <main>

        @yield('content')








        <!-- /.container -->

    </main>
    <hr class="featurette-divider">
    <!-- FOOTER -->
    @include('partials.front-footer')


    <script src="{{ asset('home/assets/dist/js/bootstrap.bundle.min.js') }}"></script>


</body>

</html>
