<x-layout>
@include('posts.posts-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-featured-post :post="$posts[0]"></x-featured-post>

            <div class="lg:grid lg:grid-cols-6">
                @foreach($posts->skip(1) as $post)
                    <x-rem-post :post="$post" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"></x-rem-post>
                @endforeach

            </div>
        @else
            <p class="text-center">No posts yet, check back later</p>
        @endif

        {{ $posts->links() }}



    </main>

</x-layout>
