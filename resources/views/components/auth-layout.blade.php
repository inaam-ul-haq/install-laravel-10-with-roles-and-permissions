@include('layouts.auth.links')
@include('layouts.auth.sidebar')

<div class="main">
    @include('layouts.auth.header')

    <main class="content">
        <div class="container-fluid">
            <div class="header">
                <h1 class="header-title">{{ $pageTitle != null ? $pageTitle : 'Dashboard' }}</h1>

                @isset($head_button)
                    {{ $head_button }}
                @endisset
            </div>

            {{ $slot }}
        </div>
    </main>

    <footer class="footer">
        <div class="container-fluid">
            <div class="row text-muted">
                <div class="col-8 text-start">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-muted" href="#">Support</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-muted" href="#">Privacy</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-muted" href="#">Terms of Service</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-muted" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="col-4 text-end">
                    <span class="mb-0">Copyright &copy; <a href="{{ route('auth') }}">{{ config('app.name') }}</a>
                        {{ date('Y') }}</span>
                </div>
            </div>
        </div>
    </footer>
</div>

@include('layouts.auth.footer')
