<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

@if($categories->count())
    <div class="relative mb-4 flex items-center gap-2">
        <!-- Botón scroll izquierdo -->
        <button id="scroll-left" onclick="scrollCategories('left')" class="hidden md:flex items-center justify-center w-9 h-9 rounded-full bg-white border border-pink-600 hover:bg-pink-300 transition absolute left-0 z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-600" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 19l-7-7 7-7"/>
            </svg>
        </button>

        <!-- Contenedor deslizable con ID -->
        <div id="category-scroll" class="flex items-center gap-3 px-10 scrollbar-hide w-full whitespace-nowrap overflow-x-auto scroll-smooth">
            @foreach($categories->take(15) as $category)
                <div class="flex items-center bg-white rounded-full shadow-md px-4 py-1 transition shrink-0 hover:bg-pink-100">
                    <a href="{{ route('categories.show', $category->slug) }}"
                       class="text-black font-medium text-sm hover:text-pink-900">
                        {{ $category->name }}
                    </a>
                    @if ($category->user_id === auth()->id())
                        <a href="{{ route('categories.edit', $category->slug) }}" class="ml-2 text-pink-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 hover:text-pink-700" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 16H9v-3z"/>
                            </svg>
                        </a>
                    @endif
                </div>
            @endforeach

            @if($categories->count() > 15)
                <div class="shrink-0">
                    <a href="{{ route('categories.index') }}"
                       class="text-pink-600 border border-pink-600 py-1 text-sm font-medium whitespace-nowrap hover:bg-pink-100 hover:text-pink-900 hover:border-none px-4 rounded-full">
                        Ver más categorías
                    </a>
                </div>
            @endif
        </div>

        <!-- Botón scroll derecho -->
        <button id="scroll-right" onclick="scrollCategories('right')" class="hidden md:flex items-center justify-center w-9 h-9 rounded-full bg-white hover:bg-pink-300 border border-pink-600 transition absolute right-0 z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-600" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 5l7 7-7 7"/>
            </svg>
        </button>

        <!-- Botón Agregar categoría -->
        @auth
            <div class="relative group shrink-0">
                <a href="{{ route('categories.create') }}"
                   class="flex items-center justify-center w-9 h-9 bg-pink-600 text-white rounded-full hover:bg-pink-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4v16m8-8H4"/>
                    </svg>
                </a>
                <div
                    class="absolute bottom-full mb-1 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs rounded py-1 px-2 opacity-0 group-hover:opacity-100 transition whitespace-nowrap">
                    Agregar categoría
                </div>
            </div>
        @endauth
    </div>
@else
    <div class="flex items-center gap-2 mb-4">
        <p class="text-[#522546]">{{ __('No hay categorías') }}</p>

        @auth
            <div class="relative group">
                <a href="{{ route('categories.create') }}"
                   class="flex items-center justify-center w-8 h-8 bg-pink-600 text-white rounded-full hover:bg-pink-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4v16m8-8H4"/>
                    </svg>
                </a>
                <div
                    class="absolute bottom-full mb-1 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs rounded py-1 px-2 opacity-0 group-hover:opacity-100 transition whitespace-nowrap">
                    Agregar categoría
                </div>
            </div>
        @endauth
    </div>
@endif

<!-- Script para manejar el scroll horizontal -->
<script>
    function scrollCategories(direction) {
        const container = document.getElementById('category-scroll');
        const amount = 200;

        if (direction === 'left') {
            container.scrollBy({ left: -amount, behavior: 'smooth' });
        } else {
            container.scrollBy({ left: amount, behavior: 'smooth' });
        }
    }

    function updateScrollButtons() {
        const container = document.getElementById('category-scroll');
        const leftBtn = document.getElementById('scroll-left');
        const rightBtn = document.getElementById('scroll-right');

        if (!container) return;

        const scrollLeft = container.scrollLeft;
        const maxScrollLeft = container.scrollWidth - container.clientWidth;

        leftBtn.style.display = scrollLeft > 10 ? 'flex' : 'none';
        rightBtn.style.display = scrollLeft < maxScrollLeft - 10 ? 'flex' : 'none';
    }

    window.addEventListener('load', updateScrollButtons);
    window.addEventListener('resize', updateScrollButtons);

    document.getElementById('category-scroll')?.addEventListener('scroll', updateScrollButtons);
</script>
