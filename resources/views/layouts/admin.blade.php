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
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    @include('admin.navbar')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-xl-2 d-none d-md-block p-1 bg-secondary text-white h-100">
                @include('admin.menu')
            </div>
            <div class="col p-1">RIGHT</div>
        </div>
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
