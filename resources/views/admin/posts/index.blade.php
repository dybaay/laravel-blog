<x-layout>

    <section class="max-w-2xl mx-auto mb-5">
        <div class="flex justify-between">
            <aside class="mr-10">
                <a href="/admin/posts/create" class="hover:text-blue-600">New Post</a>
            </aside>
            <div class="border border-gray-200 p-10 rounded-xl flex-1">
                <!-- This example requires Tailwind CSS v2.0+ -->
                @if ($posts->count() < 1)
                    <p>No posts yet!</p>
                @endif

                <div class="flex flex-col">

                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    @foreach($posts as $post)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <a href="/post/{{ $post->id }}">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $post->title }}
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>

                                            {{--                                <td class="px-6 py-4 whitespace-nowrap">--}}
                                            {{--                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">--}}
                                            {{--                  Active--}}
                                            {{--                </span>--}}
                                            {{--                                </td>--}}

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="/admin/post/{{ $post->id }}/edit" class="text-blue-600 hover:text-blue-900">Edit</a>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form action="/admin/post/{{ $post->id }}/delete" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="text-red-600 bg-white cursor-pointer hover:text-red-900" value="Delete">
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- More people... -->
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--    {{ $posts->links() }}--}}
</x-layout>
