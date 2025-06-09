<x-app-layout>
    <x-header-categories />
    <x-main>
        <x-lista-posts :posts="$posts->where('user_id', auth()->id())" />
    </x-main>
</x-app-layout>
