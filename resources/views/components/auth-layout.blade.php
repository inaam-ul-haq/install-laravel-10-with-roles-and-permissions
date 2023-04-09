@include('layouts.auth_links')

{{ $slot }}

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span> {{ config('app.name') }} Copyright &copy; {{ date('Y') }}</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
</div>

@include('layouts.auth_footer')
