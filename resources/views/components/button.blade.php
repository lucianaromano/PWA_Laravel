<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-white text-black px-8 py-2 rounded-full    text-center items-center border border-transparent uppercase']) }}>
    {{ $slot }}
</button>