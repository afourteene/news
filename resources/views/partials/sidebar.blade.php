<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ url()->current() === route('dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard') }}">
            داشبرد
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ url()->current() === route('posts') ? 'active' : '' }}" href="{{ route('posts') }}">
            پست ها
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ url()->current() === route('categories') ? 'active' : '' }}" href="{{ route('categories') }}">
            دسته بندی ها
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ url()->current() === route('messages') ? 'active' : '' }}" href="{{ route('messages') }}">
            پیام ها 
          </a>
        </li>
        @if (Auth::user()->role == 'admin')
        <li class="nav-item">
          <a class="nav-link {{ url()->current() === route('users') ? 'active' : '' }}" href="{{ route('users') }}">
            کاربران
          </a>
        </li>
        @endif

        <li class="nav-item">
          <a class="nav-link {{ url()->current() === route('info') ? 'active' : '' }}" href="{{ route('info') }}">
            اطلاعات
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ url()->current() === route('slider') ? 'active' : '' }}" href="{{ route('slider') }}">
            
            اسلایدر
          </a>
        </li>
        


      </ul>

     
  </nav>