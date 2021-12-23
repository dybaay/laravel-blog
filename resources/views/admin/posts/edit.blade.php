
<x-layout>
    <section class="max-w-md mx-auto">
        <h1 class="ml-5 mb-4 text-lg font-bold"> Update post </h1>
        <form action="/admin/post/{{ $post->id }}" class="border border-gray-200 rounded-xl p-6 " method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <label class="font-bold uppercase block mb-2 text-xs text-gray-700">
                Title
            </label>
            <input name="title"
                   type="text"
                   class="border border border-gray-400 p-2 mb-2 w-full rounded"
                   placeholder="Your post title"
                   value="{{ old('title', $post->title) }}"
                   required>
            @error('title')
            <p class="text-xs mt-2 text-red-500">{{ $message }}</p>
            @enderror
            <label class="font-bold uppercase block mb-2 text-xs text-gray-700">
                Slug
            </label>

            <label class="font-bold uppercase block mb-2 text-xs text-gray-700">
                Thumbnail
            </label>
            <input name="thumbnail"
                   type="file"
                   class="border border border-gray-400 p-2 w-full rounded"
                   value="{{ old('thumbnail', $post->thumbnail) }}"
                   >
            @error('thumbnail')
            <p class="text-xs mt-2 text-red-500">{{ $message }}</p>
            @enderror
            <div class="mt-5">
                <label class="font-bold uppercase block mb-2 text-xs text-gray-700">
                    Excerpt
                </label>
                <textarea rows="6"
                          name="excerpt"
                          class="w-full text-sm focus:outline-none focus:ring border border border-gray-400 rounded"
                          placeholder="Your post introduction"
                          required>
                {{ old('excerpt', $post->excerpt) }}
            </textarea>
                @error('excerpt')
                <p class="text-xs mt-2 text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-5">
                <label class="font-bold uppercase block mb-2 text-xs text-gray-700">
                    Body
                </label>
                <textarea rows="6"
                          name="body"
                          class="w-full text-sm focus:outline-none focus:ring border border border-gray-400 rounded"
                          placeholder="Your post main content" required>
                                {{ old('body', $post->body) }}

            </textarea>
                @error('body')
                <p class="text-xs mt-2 text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-5">
                <label class="font-bold uppercase block mb-2 text-xs text-gray-700">
                    Category
                </label>
                <select name="category_id" class="border border border-gray-400 p-2 w-full rounded">
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ old($category->id) == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
                @error('category')
                <p class="text-xs mt-2 text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end">
                <button type="submit" class="uppercase px-10 py-2 text-white mt-10 text-xs rounded-2xl bg-blue-500 hover:bg-blue-600">Update</button>
            </div>
        </form>
    </section>
</x-layout>
