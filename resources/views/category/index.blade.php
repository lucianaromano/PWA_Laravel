<x-app-layout>
    <div class="text-center bg-pink-200 text-pink-900 shadow py-4">
        <h2 class="text-2xl font-semibold">{{ __('Listado de categorías') }}</h2>
    </div>

    <x-main>
        <div class="flex justify-center -mt-2 flex-wrap gap-4">
            <a href="{{ route('categories.create') }}"
               class="bg-white text-[#732255] font-bold px-8 py-2 rounded-full text-center items-center border-2 border-[#732255] shadow-lg uppercase inline-block hover:bg-[#732255] hover:text-white transition duration-200 mb-6">
                {{ __('+ Añadir nueva categoría') }}
            </a>
        </div>

        {{-- Todas las categorías --}}
        <x-categories :categories="$categories" />
    </x-main>
</x-app-layout>