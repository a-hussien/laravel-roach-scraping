<x-layout.app lang="ar" dir="rtl">

    <x-slot:title>YallaKora</x-slot>

    <x-title title="YallaKora" />

    <x-container>
        @forelse ($items[0]['news'] as $i => $item)
        <div class="relative w-96 h-[22rem] bg-white shadow-lg hover:shadow-2xl rounded-md">
            <span class="absolute top-2 left-2 text-amber-400 font-semibold font-figtree bg-black/40 backdrop-blur-sm rounded-full p-2">{{ $item['cat'] ?? "N/A" }}</span>
            <img src="{{ $item['img'] }}" alt="news-img" class="w-full max-h-64 rounded-t-md">
            <div class="flex flex-col justify-start items-start p-2">
                <h3 class="text-xl font-medium font-figtree leading-6 tracking-wide whitespace-pre-line">{{ $item['title'] }}</h3>
                <span class="absolute top-2 text-white font-semibold font-figtree float-right bg-black/40 backdrop-blur-sm rounded-full p-2">{{ $item['date'] . " - ". $item['time'] }}</span>
            </div>
            <div class="absolute bottom-1 right-[33.33%] flex flex-row items-center justify-center mb-2">
                <a class="p-4 font-mono font-bold bg-amber-400 hover:bg-amber-300 text-black rounded-full shadow-md hover:shadow-amber-200 hover:text-blue-700" target="_blank" href="{{ $item['link'] }}">  المــزيد </a>
            </div>
        </div>
        @empty
        <div class="p-16 text-red-500 bg-white shadow-lg hover:shadow-2xl rounded-md">
            <h2>Service not available right now, please come later</h2>
        </div>
        @endforelse
    </x-container>

</x-layout.app>
