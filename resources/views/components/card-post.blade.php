@props(['post'])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    <img class="w-full h-72 object-cover object-center" src="{{ Storage::url($post->image->url) }}" alt="post">
    <div class="px-6 py-4">
        <h2 class="font-bold text-xl mb-2">
            <a href="{{ route('posts.show', $post) }}">
                {{ $post->name }}
            </a>
        </h2>

        <div class="text-gray-700 text-base">
            {{ $post->extract }}
        </div>

        <div class="py-3">
            @foreach ($post->tags as $tag)
                <a href="{{ route('posts.tag', $tag) }}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-white mr-2" style="background-color: {{ $tag->color }};">
                    {{ $tag->name }}
                </a>
            @endforeach
        </div>
    </div>
</article>