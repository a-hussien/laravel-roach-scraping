<!DOCTYPE html>
<html lang="{{$lang}}" dir="{{$dir}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title . ' | Web Scraping with laravel/Roach' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="min-h-screen bg-slate-100">
            <x-navBar />
            <div class="p-4">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
