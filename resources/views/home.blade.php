<x-app-layout  :categories="$categories">
    <x-header-categories />

    <x-main>
        <x-title> {{ __('Posts más recientes') }}</x-title>
        <x-poster :post="$posts->first()" />
        <x-lista-posts :posts="$posts->skip(1)" />
    </x-main>

</x-app-layout>
