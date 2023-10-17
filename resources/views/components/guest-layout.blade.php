@include('layouts.guest.links')

@include('layouts.guest.guest-nav')

<main class="py-4">
    {{ $slot }}
</main>

@include('layouts.guest.footer')
