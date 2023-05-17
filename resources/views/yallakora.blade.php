<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{app()->getLocale() == "ar" ? "rtl": "ltr" }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>YallKora | Roach Web Scraping with laravel</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="min-h-screen bg-slate-100">
            <div class="p-4">
                <h2 class="text-4xl font-figtree font-medium text-slate-900 text-center mx-auto mb-8">YallaKora</h2>
                <div class="flex flex-col md:flex-row flex-wrap gap-8 justify-center items-center mx-auto">
                    @foreach ($items[0]['news'] as $i => $item)
                        <div class="relative w-96 h-[22rem] bg-white shadow-lg hover:shadow-2xl rounded-md">
                            <span class="absolute top-2 left-2 text-amber-400 font-semibold font-figtree bg-black/40 backdrop-blur-sm rounded-full p-2">{{ $item['cat'] }}</span>
                            <img src="{{ $item['img'] }}" alt="news-img" class="w-full max-h-64 rounded-t-md">
                            <div class="flex flex-col justify-start items-start p-2">
                                <h3 class="text-xl font-medium font-figtree leading-6 tracking-wide whitespace-pre-line">{{ $item['title'] }}</h3>
                                <span class="absolute top-2 text-white font-semibold font-figtree float-right bg-black/40 backdrop-blur-sm rounded-full p-2">{{ $item['date'] . " - ". $item['time'] }}</span>
                            </div>
                            <div class="absolute bottom-1 right-[33.33%] flex flex-row items-center justify-center mb-2">
                                <a class="p-4 font-mono font-bold bg-amber-400 hover:bg-amber-300 text-black rounded-full shadow-md hover:shadow-amber-200 hover:text-blue-700" target="_blank" href="{{ $item['link'] }}">  المــزيد </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
