@props(['comment'])
<article class="flex bg-gray-100 border border-gray-200 rounded-xl p-6 space-x-4">
    <div class="flex-shrink-0">
        <img alt="avatar" src="https://i.pravatar.cc/60?u={{ $comment->id }}" class="rounded-xl"/>
    </div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{ $comment->user->email }}</h3>
            <p class="text-xs"> Posted
                <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time>
            </p>
        </header>
        <p>
            {{ $comment->comment }}

        </p>
    </div>
</article>
