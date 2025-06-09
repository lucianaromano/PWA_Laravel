
<x-app-layout>
    <x-header-categories />
    <x-main>
        <x-title> {{ __('All Posts') }}</x-title>

        <x-lista-posts :posts="$posts" />

         <!-- Paginacion -->
        <div class="pagination">
            {{ $posts->appends(request()->query())->links() }}
        </div>
        
    </x-main>
</x-app-layout>
