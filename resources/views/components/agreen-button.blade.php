<a
    {{ $attributes->class(['inline-flex items-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-500 focus:bg-lime-500 active:bg-lime-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'])->merge(['href' => $href]) }}
>{{ $slot }}
</a>
