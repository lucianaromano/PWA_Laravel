<x-app-layout>
    <x-header-categories />
    <x-main>
        <div class="max-w-5xl mx-auto bg-white dark:bg-[#a27893] rounded-lg shadow-md overflow-hidden flex flex-col lg:flex-row-reverse">

            <!-- Imagen a la derecha -->
            <div class="w-full lg:w-1/2 h-96 lg:h-auto">
                <img src="{{ old('poster', $post->poster) }}" alt="Current image" class="w-full h-full object-cover">
            </div>

            <!-- Formulario a la izquierda -->
            <div class="w-full lg:w-1/2 p-6 flex flex-col justify-between">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Editar publicación</h2>

                <form method="POST" action="{{ route('posts.update', $post->id) }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <!-- Título -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Título</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-black-200">
                    </div>

                    <!-- Categoría -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categoría</label>
                        <select name="category" id="category" required
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200">
                            <option value="">Seleccioná una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- URL de imagen -->
                    <div>
                        <label for="poster" class="block text-sm font-medium text-gray-700 dark:text-gray-300">URL de la imagen</label>
                        <input type="url" name="poster" id="poster" value="{{ old('poster', $post->poster) }}"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200"
                            placeholder="https://example.com/image.jpg">
                    </div>

                    <!-- Contenido -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contenido</label>
                        <textarea name="content" id="content" rows="5" required
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200">{{ old('content', $post->content) }}</textarea>
                    </div>

                    <!-- Botón -->
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full px-4 py-2 bg-[#8eb6d4] text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                            Actualizar Post
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Botón volver -->
        <div class="mt-6 max-w-5xl mx-auto">
            <div class="p-4 bg-white dark:bg-[#732255] shadow sm:rounded-lg text-center">
                <a href="{{ route('posts.index') }}" class="text-white-600 hover:underline">← Volver a los Posts</a>
            </div>
        </div>
|   </x-main>
</x-app-layout>

