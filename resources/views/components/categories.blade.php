@props(['categories'])

@if($categories->count())
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        @foreach($categories as $category)
            <div
                class="bg-white rounded-lg shadow-md px-6 py-4 transition transform hover:-translate-y-1 hover:shadow-lg hover:bg-pink-50 cursor-pointer"
                onclick="window.location='{{ route('categories.show', $category->slug) }}'">
                <div class="mb-2 flex items-center justify-between">
                    <div>
                        <a href="{{ route('categories.show', $category->slug) }}"
                           class="text-2xl font-bold text-[#522546] inline">
                            Categoría: {{ $category->name }}
                        </a>
                        <span class="ml-2 text-sm text-gray-500 align-middle">
                            creada por <span class="font-medium">{{ $category->user->name }}</span>
                        </span>
                    </div>

                    @if ($category->user_id === auth()->id())
                        <a href="{{ route('categories.edit', $category->slug) }}"
                           class="text-pink-200 hover:text-pink-700 ml-4" title="Editar categoría">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 16H9v-3z"/>
                            </svg>
                        </a>
                    @endif
                </div>

                <p class="text-gray-700">{{ $category->description }}</p>
                <p class="text-xs text-gray-500 mt-2">
                    {{ $category->created_at->diffForHumans() }}
                </p>
            </div>
        @endforeach
    </div>
@else
    <p class="text-[#522546]">{{ __('No hay categorías') }}</p>
@endif


