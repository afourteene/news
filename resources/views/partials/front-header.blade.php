<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">سایت خبری</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="تبديل التنقل">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link  {{ url()->current() === route('vip') ? 'active' : '' }}" aria-current="page" href="{{ route('vip') }}">ویژه</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ url()->current() === route('public') ? 'active' : '' }}" href="{{ route('public') }}"> عمومی</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ url()->current() === route('contact') ? 'active' : '' }}" href="{{ route('contact') }}" tabindex="-1" aria-disabled="true">تماس با ما</a>
                    </li>


                </ul>
                <div class="d-flex">
                    <ul  class="navbar-nav me-auto mb-2 mb-md-0">
                        @auth
                        <li class="nav-item">
                            <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">داشبرد</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3" href="{{ route('logout') }}">خروج</a>
                         </li>
                         
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('login') }}" tabindex="-1" aria-disabled="true">ورود</a>
                        </li>

                        @endguest
                    </ul>
                </div>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="جستجو" aria-label="جستجو">
                    <button class="btn btn-outline-success" type="submit">جستجو</button>
                </form>
            </div>
        </div>
    </nav>
</header>