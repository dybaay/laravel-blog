<x-layout>


    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="/storage/{{ $post->thumbnail }}" alt="" class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published <time>{{ $post->created_at->diffForHumans() }}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3 text-left">
                        <h5 class="font-bold"><a href="/?user={{ $post->user->email }}" >{{ $post->user->name }}</a></h5>
                        <h6>Mascot at Laracasts</h6>
                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/"
                       class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Posts
                    </a>

                    <div class="space-x-2">
                        <a href="/?category={{ $post->category->id }}"
                           class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                           style="font-size: 10px">{{ $post->category->name }}</a>
                        <a href="#"
                           class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold"
                           style="font-size: 10px">Updates</a>
                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ $post->title }}

                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">
                    <p>
                        {{ $post->body }}
                    </p>
                </div>
            </div>
            <section class="col-span-8 col-start-5 mt-10 space-y-6">
                @auth
                <form action="/post/{{ $post->id }}/comments" class="border border-gray-200 rounded-xl p-6" method="POST">
                    @csrf

                    <header class="flex items-center">
                        <img alt="avatar" src="https://i.pravatar.cc/60?u={{ auth()->id() }}" class="rounded-xl"/>
                        <h2 class="ml-5"> Want to participate? </h2>

                    </header>
                    <div class="mt-5">
                        <textarea rows="6" name="comment" class="w-full text-sm focus:outline-none focus:ring" placeholder="Quick, say something!" required></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="uppercase px-10 py-2 text-white mt-10 text-xs rounded-2xl bg-blue-500 hover:bg-blue-600">Post</button>
                    </div>
                </form>
                @else
                    <p class="font-semibold"> <a class="hover:underline" href="/login">Login</a> or <a class="hover:underline" href="/register">Register</a> to say something! </p>
                @endauth



                @foreach ( $post->comments as $comment)
                    <x-post-comment :comment="$comment"></x-post-comment>

                @endforeach

            </section>
        </article>
    </main>

</x-layout>


