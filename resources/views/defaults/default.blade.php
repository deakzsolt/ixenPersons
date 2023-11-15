<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ixen Persons lister</title>

        <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body class="antialiased">
        <main>
            @yield('content')
        </main>
    </body>
</html>
