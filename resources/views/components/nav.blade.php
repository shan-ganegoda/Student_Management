<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}"><i class="bi bi-box-seam-fill"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('student') }}">Student Management</a>
          </li>
        </ul>
          @if (Auth::user())
          <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf
  
            <x-responsive-nav-link href="{{ route('logout') }}"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
          @else
            <div class="buttons">
              <span><a href="{{ route('login') }}">Login</a></span> &nbsp&nbsp<span><a href="{{ route('register') }}">Register</a></span>
            </div>
          @endif
      </div>
    </div>
  </nav>