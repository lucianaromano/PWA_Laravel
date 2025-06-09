
@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => '
    border-transparent
    bg-pink-100 
    dark:text-black-300 
    focus:border-[#732255]
    focus:ring-[#732255] 
    dark:focus:border-[#732255] 
    dark:focus:ring-[#732255] 
    rounded-full shadow-sm
']) }}>
