<x-layout.app lang="en" dir="ltr">

    <x-slot:title>Books</x-slot>

    <x-title title="Books" />

    <x-container>
        @forelse ($items[0]['books'] as $i => $item)
        <div class="relative w-96 h-[22rem] bg-white shadow-lg hover:shadow-2xl rounded-md">
            <span class="absolute top-2 left-2 text-amber-400 font-semibold font-figtree bg-black/40 backdrop-blur-sm rounded-full p-2">{{ $item['price'] }}</span>
            <img src="{{ $item['img'] }}" alt="news-img" class="w-full max-h-64 rounded-t-md">
            <div class="flex flex-col justify-start items-start p-2">
                <h3 class="text-xl font-medium font-figtree leading-6 tracking-wide whitespace-pre-line">{{ $item['title'] }}</h3>
                <span class="absolute top-2 right-2 text-white font-semibold font-figtree bg-black/40 backdrop-blur-sm rounded-full p-2">{{ $item['availability'] }}</span>
            </div>
            <div class="absolute w-full bottom-0 flex flex-row items-center justify-center">
                <a class="p-2 w-full h-10 font-mono font-bold bg-teal-400 hover:bg-teal-300 text-white rounded-b-md shadow-md hover:text-teal-700 text-center" target="_blank" href="{{ $item['link'] }}"> Read Now </a>
            </div>
        </div>
        @empty
        <div class="p-16 text-red-500 bg-white shadow-lg hover:shadow-2xl rounded-md">
            <h2>Service not available right now, please come later</h2>
        </div>
        @endforelse
    </x-container>

</x-layout.app>
