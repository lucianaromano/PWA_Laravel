<x-app-layout>
    <x-header-categories />
    <div class="mx-auto max-w-4xl py-5">
    <div class="max-w-4xl mx-auto px-0 flex flex-col md:flex-row rounded shadow overflow-hidden" style="min-height: 400px;">
        <form action="{{ route('categories.update', $category->slug) }}" method="POST" class="bg-[#a27893] w-full px-12 py-8 overflow-auto transition-all duration-300" id="formSection">
        @csrf
        @method('PUT')

        <div class="relative mb-6">
            <input
                type="text"
                name="name"
                value="{{ old('name', $category->name ?? '') }}"
                placeholder="Nombre de la Categoria"
                class="w-full text-white text-xl font-semibold bg-transparent placeholder-gray-500 border-none outline-none ring-0 focus:ring-0 focus:outline-none focus:border-none transition-all duration-300"
                autocomplete="off"
                autofocus
            />
        </div>

        <div class="relative mb-6">
            <textarea
                name="description"
                rows="4"
                placeholder="¿De qué tratará esta sección?..."
                class="w-full text-white text-sm bg-transparent placeholder-gray-500 border-none outline-none ring-0 focus:ring-0 focus:outline-none focus:border-none transition-all duration-300"
                autocomplete="off"
            >{{ old('description', $category->description ?? '') }}</textarea>
        </div>

        <div class="flex items-center gap-4 mt-6">
            <form action="{{ route('categories.update', $category->slug) }}" method="POST" class="inline">
                @csrf
                @method('PUT')
                <x-button>
                    {{ __('Actualizar categoría') }}
                </x-button>
            </form>
            <form action="{{ route('categories.destroy', $category->slug) }}" method="POST" onsubmit="return confirm('¿Estás segura de que quieres eliminar esta categoría?');" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="border border-white text-white px-8 py-2 rounded-full cursor-pointer text-center items-center uppercase bg-red-600 hover:bg-red-700 transition">
                    {{ __('Eliminar categoría') }}
                </button>
            </form>
        </div>
        </form>
    </div>
    <div>
</x-app-layout>