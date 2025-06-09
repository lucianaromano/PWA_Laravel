<x-app-layout>
    <x-header-categories />
    <x-main>
        <div class=" w-full mb-4 bg-white bg-gray-800">
            <div class="mb-2">
                <h1 class="text-2xl font-bold text-gray-900 text-black inline">
                    Categoría: {{ $category->name }}
                </h1>
                <span class="ml-2 text-sm text-gray-500 text-gray-400 align-middle">
                    creada por <span class="font-medium">{{ $category->user->name }}</span>
                </span>
            </div>

            <p class="text-gray-700 text-gray-300">{{ $category->description }}</p>
            <p class="text-xs text-gray-500 text-gray-400 mt-2">
                {{ $category->created_at->diffForHumans() }}
            </p>
        </div>

        @if($posts->count())
            <x-lista-posts :posts="$posts" />
        @else
            <p class="text-pink-300">No hay posts en esta categoría aún.</p>
        @endif
    </x-main>
</x-app-layout>