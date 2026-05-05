@props(['category'])
<a
    href="{{ route("shop.index",[
    'category_id' => $category->id
    ]) }}"
    class="group text-center space-y-4">
    <div class="h-40 w-full relative bg-[#F5F5F5] rounded-[4px]">
        <img class="h-full w-full object-contain" src="{{ asset("storage/" . $category->image_url) }}" alt="">
    </div>
    <h4 class="cta font-medium text-gray-800 capitalize">
        {{ $category->name }} <span></span>
    </h4>
</a>
