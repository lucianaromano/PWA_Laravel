@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-pink-900']) }}>
    {{ $value ?? $slot }}
</label>
