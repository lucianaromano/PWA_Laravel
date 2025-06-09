@props(['post'])

@if ($post)
    <div class="sm:col-span-2 lg:col-span-3 py-4 sm:mx-4">
        <div class="relative group overflow-hidden transition-transform duration-300 transform hover:scale-105 rounded-lg shadow-2xl shadow-[#732255]/30 hover:shadow-3xl">
            <!-- Imagen -->
            <img src="{{ $post->poster }}" alt="{{ $post->title }}" class="w-full h-[500px] object-cover">

            <!-- Overlay superior (SIEMPRE VISIBLE) -->
            <div class="absolute top-0 left-0 w-full bg-[#a27893]/70 hover:bg-[#732255]/80 text-white text-sm p-4 transition duration-300 flex justify-between items-start">
                <div>
                    <p class="font-semibold">
                        Publicado por {{ $post->user->name }}
                        <span class="text-xs text-pink-100">{{ $post->created_at->diffForHumans() }}</span>
                    </p>
                </div>

                <a href="{{ route('posts.show', $post->id) }}" 
                   class="flex items-center gap-1 px-4 py-2 bg-pink-100 text-pink-900 rounded-full hover:bg-transparent border border-transparent hover:border-pink-100 hover:text-pink-100 transition">
                    Ver más
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Overlay inferior (APARECE EN HOVER) -->
            <div class="absolute bottom-0 left-0 w-full bg-[#a27893]/70 hover:bg-[#732255]/80 text-white text-sm p-4 opacity-0 group-hover:opacity-100 transition duration-300 flex justify-between items-start">
                <!-- Título y resumen -->
                <div>
                    <h3 class="text-xl font-bold">{{ $post->title }}</h3>
                    <p class="line-clamp-2 text-sm">{{ Str::limit($post->content, 100) }}</p>
                </div>

                <!-- Categoría a la derecha -->
                <a href="{{ route('categories.show', $post->category->slug) }}"
                   class="text-lg italic font-extrabold text-pink-900 hover:text-white cursor-pointer ml-4 whitespace-nowrap bg-pink-100 py-1 px-5 hover:bg-transparent border border-l-2 rounded-l-full">
                    #{{ $post->category->name }}
                </a>
            </div>
        </div>
    </div>
@endif