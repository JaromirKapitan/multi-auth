<!DOCTYPE html>
<html lang="sk">
    <head>
        <meta charset="UTF-8">
        <title>Classic white</title>
        @vite([
            'frontend-themes/classic-white/resources/css/app.css',
            'frontend-themes/classic-white/resources/js/app.js',
        ])
    </head>
    <body>
    <div class="container">
        @yield('content')
    </div>
    </body>
</html>
