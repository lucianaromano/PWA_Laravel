<div class="py-5 w-full">
    @auth
        <a href="{{ route('posts.create') }}"
           class="bg-white text-[#732255] font-bold px-8 py-2 rounded-full text-center items-center border-2 border-[#732255] shadow-lg uppercase inline-block hover:bg-[#732255] hover:text-white transition duration-200 mb-6">
            {{ __('+ Añadir Post') }}
        </a>
    @endauth

    <div class="py-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 w-full">
            @foreach ($posts as $post)
                <div class="bg-[#a27893]/70 rounded-lg shadow-2xl shadow-[#732255]/30 overflow-hidden transform transition-transform transition-shadow duration-300 hover:scale-105 hover:shadow-3xl hover:bg-[#732255]/80">
                    <!-- Header: Usuario -->
                    <div class="flex items-center p-4">
                        <p class="text-sm font-semibold text-white px-2">{{ $post->user->name }}</p>
                        <p class="text-xs text-pink-100">{{ $post->created_at->diffForHumans() }}</p>
                    </div>

                    <!-- Imagen -->
                    <img src="{{ $post->poster }}" alt="{{ $post->title }}" class="w-full h-60 object-cover">

                    <!-- Contenido -->
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-white mb-1">
                            {{ $post->title }}
                        </h3>
                        <p class="text-sm text-pink-100 line-clamp-3">
                            {{ $post->content }}
                        </p>

                        <!-- Categoría y Ver más -->
                        <div class="mt-3 flex justify-between items-center text-sm text-gray-600">
                            <span>
                                <a href="{{ route('categories.show', $post->category->slug) }}"
                                   class="font-medium text-pink-900 px-2 py-1 hover:text-white cursor-pointer">
                                    #{{ $post->category->name }}
                                </a>
                            </span>
                            <a href="{{ route('posts.show', $post->id) }}"
                               class="px-4 py-2 bg-pink-100 text-pink-900 rounded-full hover:bg-transparent border border-transparent hover:border-pink-100 hover:text-pink-100 transition">
                                Ver más
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

            @if ($posts->isEmpty())
                <p class="text-gray-600 dark:text-gray-300">No hay publicaciones disponibles.</p>
            @endif
        </div>
    </div>
</div>

