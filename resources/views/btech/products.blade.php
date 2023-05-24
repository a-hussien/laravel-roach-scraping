<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>B-Tech-Mobiles | Roach Web Scraping with laravel</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="min-h-screen bg-slate-100">
            <div class="p-4">
                <h2 class="text-4xl font-figtree font-medium text-slate-900 text-center mx-auto mb-8">B-Tech Mobiles</h2>
                <div class="flex flex-col md:flex-row flex-wrap gap-8 justify-center items-center mx-auto">
                    @foreach ($items[0]['products'] as $item)
                        <div class="relative w-96 h-[22rem] bg-white shadow-lg hover:shadow-2xl rounded-md">
                            <span class="absolute top-2 left-2 text-amber-400 font-semibold font-figtree bg-black/40 backdrop-blur-sm rounded-full p-2">{{ $item['price'] ?? 'N/A' }}</span>
                            <img src="{{ $item['img'] }}" alt="news-img" class="w-full max-h-64 rounded-t-md">
                            <div class="flex flex-col justify-start items-start p-2">
                                <h3 class="text-xl font-medium font-figtree leading-6 tracking-wide whitespace-pre-line">{{ $item['title'] }}</h3>
                            </div>
                            <div class="absolute w-full bottom-0 flex flex-row items-center justify-center">
                                <a class="p-2 w-full h-10 font-mono font-bold bg-teal-400 hover:bg-teal-300 text-white rounded-b-md shadow-md hover:text-teal-700 text-center" target="_blank" href="{{ $item['link'] }}"> Buy </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
