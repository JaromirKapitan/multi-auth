<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/admin.scss', 'resources/js/admin.js'])
</head>
<body>
    @include('admin.navbar')

    <div class="container-fluid">

        @guest
            <main class="py-4">
                @yield('content')
            </main>
        @else
            <main class="row">
                <div class="col-md-3 col-xl-2 d-none d-md-block menu">
                    @include('admin.menu')
                </div>
                <div class="col">
                    @yield('content')
                </div>
            </main>
        @endguest
    </div>



{{--    @include('admin.menu')--}}
{{--    <div style="width: 200px;">--}}
{{--        Hello--}}
{{--    </div>--}}

{{--    <div>--}}

{{--        <main class="py-4">--}}
{{--            @yield('content')--}}
{{--        </main>--}}
{{--    </div>--}}
</body>
</html>
