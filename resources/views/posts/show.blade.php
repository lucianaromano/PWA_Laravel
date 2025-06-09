<x-app-layout>
    <x-header-categories />
    <x-main>
        <div class="max-w-5xl mx-auto bg-white dark:bg-[#a27893] rounded-lg shadow-md overflow-hidden flex flex-col lg:flex-row-reverse">
            
            <!-- Imagen a la derecha -->
            <div class="w-full lg:w-1/2 h-96 lg:h-auto">
                <img src="{{ $post->poster }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
            </div>

            <!-- Contenido a la izquierda -->
            <div class="w-full lg:w-1/2 p-6 flex flex-col justify-between">
                <!-- Usuario + Fecha + Categoria -->
                <div class="mb-4 flex justify-between items-center">
                    <div class="flex items-center">
                        <p class="text-sm font-semibold text-gray-800 dark:text-gray-200 px-2">{{ $post->user->name }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="flex space-x-3 text-sm">
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            <a href="{{ route('categories.show', $post->category->slug) }}"class="font-medium text-pink-900  px-2 py-1 hover:text-white cursor-pointer">
                                #{{ $post->category->name }}
                            </a>
                        </p>
                    </div>
                </div>

                <!-- Título y contenido -->
                <div class="space-y-1 flex-grow">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $post->title }}</h2>
                    <p class="text-base text-gray-700 dark:text-gray-300 whitespace-pre-line">
                        {{ $post->content }}
                    </p>
                </div>

                <!-- Acciones -->
                <div class="mt-6 border-t pt-4 border-gray-200 dark:border-gray-700 flex justify-between items-center">
                    @if ($post->user_id === Auth::id())
                        <div class="flex space-x-4">
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                                    Eliminar
                                </button>
                            </form>
                        </div>

                        <div class="flex space-x-3 text-sm">
                            <a href="{{ route('posts.edit', $post->id) }}" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition">
                                Editar
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Botón volver -->
        <div class="mt-6 max-w-5xl mx-auto">
            <div class="p-4 bg-white dark:bg-[#B2C6D5] shadow sm:rounded-lg text-center">
                <a href="{{ route('posts.index') }}" class="text-gray-600 hover:underline">← Volver a los Posts</a>
            </div>
        </div>
    </x-main>
</x-app-layout>