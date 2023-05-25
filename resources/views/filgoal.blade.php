<x-layout.app lang="ar" dir="rtl">

    <x-slot:title>FilGoal</x-slot>

    <x-title title="FilGoal" />

    <x-container>
        @forelse ($items[0]['news'] as $i => $item)
        <div class="relative w-96 h-[29rem] bg-white shadow-lg hover:shadow-2xl rounded-md">
            <img src="{{ $item['img'] }}" alt="news-img" class="w-full max-h-64 rounded-t-md">
            <div class="flex flex-col justify-start items-start p-2">
                <h3 class="text-xl font-medium font-figtree leading-6 tracking-wide whitespace-pre-line">{{ $item['title'] }}</h3>
                <p class="text-gray-600 font-figtree my-3">{{ \Str::of($item['description'])->words(25, '...') }}</p>
                <span class="absolute top-[40%] text-white font-semibold font-figtree float-right bg-transparent backdrop-blur-md rounded-md p-2">{{ $item['date'] }}</span>
            </div>
            <div class="absolute bottom-1 right-[33.33%] flex flex-row items-center justify-center mb-2">
                <a class="p-4 font-figtree font-bold bg-slate-600 hover:bg-slate-500 text-slate-100 rounded-lg shadow-md hover:shadow-slate-400" target="_blank" href="{{ $item['link'] }}">  تفاصيل اكتــر </a>
            </div>
        </div>
        @empty
        <div class="p-16 text-red-500 bg-white shadow-lg hover:shadow-2xl rounded-md">
            <h2>Service not available right now, please come later</h2>
        </div>
        @endforelse
    </x-container>

</x-layout.app>
