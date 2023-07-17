@include('layouts.auth_links')
@include('layouts.auth_sidebar')

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        @include('layouts.auth_top')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">{{ $pageTitle != null ? $pageTitle : 'Dashboard' }}</h1>

                @yield('head_button')
            </div>

            {{ $slot }}
        </div>
    </div>

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; <a href="{{ route('welcome') }}">{{ config('app.name') }}</a>
                    {{ date('Y') }}</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

@include('layouts.auth_footer')
