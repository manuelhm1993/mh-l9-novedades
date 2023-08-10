<div role="alert" 
{{ $attributes->merge(['class' => "bg-$color-100 border-t border-b border-$color-500 text-$color-600 px-4 py-3"]) }}>
    <p class="font-bold">{{ $title }}</p>
    <p class="text-sm">{{ $slot }}</p>
</div>
