<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('layouts.head')

    <body>

        @include('layouts.header')

        @include('layouts.sidebarMenu')

        <main id="main" class="main">
            @yield('content')
        </main>

        @include('layouts.footer')

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        @include('layouts.scripts')
    </body>
</html>