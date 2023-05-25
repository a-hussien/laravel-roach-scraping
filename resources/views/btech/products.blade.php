<x-layout.app lang="en" dir="ltr">

    <x-slot:title>B.Tech-Mobiles</x-slot>

    <x-title title="B.Tech-Mobiles" />

    <x-container>
        @forelse ($items[0]['products'] as $i => $item)
        <div class="relative w-96 h-[28rem] bg-white shadow-lg hover:shadow-2xl rounded-md">
            <img src="{{ $item['img'] }}" alt="news-img" class="w-full max-h-64 rounded-t-md object-contain object-center">
            <div class="flex flex-col justify-start items-start p-2 bg-slate-50">
                <h3 class="p-2 h-20 text-xl font-medium font-figtree leading-6 tracking-wide whitespace-pre-line">{{ $item['title'] }}</h3>
                <div class="flex justify-center items-center font-semibold font-figtree text-2xl p-2">
                    <span class="text-slate-800">Price:</span>
                    <span class="text-xl ml-2 text-slate-600 ">
                        {{ $item['price'] ?? 'N/A' }}
                    </span>
                </div>
            </div>
            <div class="absolute w-full bottom-0 flex flex-row items-center justify-center">
                <a class="p-2 w-full h-10 font-mono font-bold bg-orange-400 hover:bg-orange-300 text-black rounded-b-md shadow-md hover:text-white text-center uppercase" target="_blank" href="{{ $item['link'] }}"> Buy </a>
            </div>
        </div>
        @empty
        <div class="p-16 text-red-500 bg-white shadow-lg hover:shadow-2xl rounded-md">
            <h2>Service not available right now, please come later</h2>
        </div>
        @endforelse
    </x-container>

</x-layout.app>

