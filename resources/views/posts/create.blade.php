<x-app-layout>
    <x-header-categories />

    <x-main>
        <div class="p-4 sm:p-8 bg-white dark:bg-[#a27893] shadow sm:rounded-lg">
            <div class="max-w-xl">
                <form method="POST" action="{{ route('posts.store') }}">
                    @csrf
                    <div class="mb-4">
                           <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Titulo</label>
                        <input type="text" name="title" id="title" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200">
                    </div>
                    <!-- category -->
                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categoria</label>
                        <select name="category" id="category" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200">
                            <option value="">Seleccione la categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label from="poster" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imagen (URL)</label>
                        <input type="url" name="poster" id="poster" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200" placeholder="https://example.com/image.jpg">
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contenido</label>
                        <textarea name="content" id="content" rows="4" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200"></textarea>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit" class="px-4 py-2 bg-[#B2C6D5] text-white rounded-md hover:bg-[#6ca8d6] focus:outline-none focus:ring focus:ring-blue-300">Crear Post</button>
                    </div>
                </form>
            </div>
        </div>            
    </x-main>

</x-app-layout>
