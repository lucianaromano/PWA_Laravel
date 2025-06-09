<x-app-layout>
    <x-header-categories />
  <div class="mx-auto max-w-4xl py-5">
        <div class="max-w-4xl mx-auto px-0 flex flex-col md:flex-row rounded shadow overflow-hidden" style="min-height: 400px;">
        <form action="{{ route('categories.store') }}" method="POST" class="bg-[#a27893] w-full px-12 py-8 overflow-auto transition-all duration-300" id="formSection">
        @csrf

        <div class="relative mb-6">
            <input
                type="text"
                name="name"
                value="{{ old('name', $category->name ?? '') }}"
                placeholder="Nombre de la Categoria"
                class="w-full text-white text-xl font-semibold bg-transparent placeholder-gray-200 border-none outline-none ring-0 focus:ring-0 focus:outline-none focus:border-none transition-all duration-300"
                autocomplete="off"
                autofocus
            />
        </div>

        <div class="relative mb-6">
            <textarea
                name="description"
                rows="4"
                placeholder="¿De qué tratará esta sección?..."
                class="w-full text-white text-sm bg-transparent placeholder-gray-200 border-none outline-none ring-0 focus:ring-0 focus:outline-none focus:border-none transition-all duration-300"
                autocomplete="off"
            >{{ old('description', $category->description ?? '') }}</textarea>
        </div>

        <div class="flex justify-between items-center mt-6">
            <x-button>
                {{__('Añadir nueva categoría') }}
            </x-button>
        </div>
        </form>
    </div>
  </div>
</x-app-layout>