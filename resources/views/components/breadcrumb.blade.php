@props(['label'])
<nav class="text-sm text-gray-500">
    <a href="{{route("home")}}" class="hover:text-black transition-colors">Home</a>
    <span class="mx-2">/</span>
    <span class="text-black">{{ $label }}</span>
</nav>
