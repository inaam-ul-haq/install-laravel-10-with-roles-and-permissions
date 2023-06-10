<header>
    <nav class="navbar navbar-expand-lg navbar-light main__header">
        <div class="container py-2">
            <a class="navbar-brand main__logo" href="{{ route('welcome') }}">
                <img src="{{ asset('assets/images/E-Purchase.png') }}" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar__collapse" id="navbarSupportedContent">
                <ul class="navbar-nav navbar__nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a
                        class="nav-link nav__link active"
                        aria-current="page"
                        href="{{route('welcome')}}#home"
                        >Home</a
                    >
                    </li>
                    <li class="nav-item">
                    <a class="nav-link nav__link" href="{{route('welcome')}}#about">About</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link nav__link" href="{{route('welcome')}}#workdoes">How it works</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link nav__link" href="{{route('welcome')}}#contactus">Contact</a>
                    </li>
                </ul>
                <div>
                    @guest
                        @if (Route::has('login'))
                            <a class="btn main__button" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif

                        @if (Route::has('register'))
                        <a class="btn main__button" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <a class="btn main__button" href="{{ route('auth') }}">{{ __('Dashboard') }}</a>

                        <a class="btn main__button" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    @endguest
                    {{-- <a href="Form.html">
                    <button class="btn main__button">Register</button>
                    </a> --}}
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-bs-labelledby="exampleModalLabel"
    aria-bs-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-bs-label="Close">
                    <span aria-bs-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input type="submit" value="Logout" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
