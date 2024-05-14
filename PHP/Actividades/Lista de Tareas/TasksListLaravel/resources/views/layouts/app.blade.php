<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('layouts.head')
    
    <body class='font-sans antialiased'>
        <div class='min-h-screen bg-gray-100'>

            <!-- Page Heading -->
            <header class='bg-white shadow'>
                <div class='max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8'>

                </div>
            </header>

            <div class='container'>
                <!-- Content Here -->
                @yield('content')
            </div>
        </div>

        @include('layouts.scripts')
    </body>
</html>