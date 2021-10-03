<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>داشبرد</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard-rtl/">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('admin/assets/dist/css/bootstrap.rtl.min.css') }}" rel="stylesheet">



    <!-- Custom styles for this template -->
    <link href="{{ asset('admin/assets/dist/css/dashboard.rtl.css') }}" rel="stylesheet">
    <!-- css multiple input -->
    @hasSection('cssinput')
        @yield('cssinput')
    @endif
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand px-3 col-md-3 col-lg-2 me-0"
            href="{{ route('dashboard') }}">{{ Auth::user()->fullname }}</a>

        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="منوی موبایل">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form action="{{ route('search') }}" class="w-100" id="search" method="GET">
            @csrf
            <input class="form-control form-control-dark w-100" type="text" placeholder="جستجو" aria-label="جستجو"
                name="search">
        </form>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="{{ route('logout') }}">خروج</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">

            <!-- side bar -->

            @include('partials.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-2">

                @yield('content')
            </main>
        </div>



    </div>


    <script src="{{ asset('admin/assets/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/dist/js/dashboard.js') }}"></script>
    @hasSection('editor')
        @yield('editor')
    @endif

</body>

</html>
