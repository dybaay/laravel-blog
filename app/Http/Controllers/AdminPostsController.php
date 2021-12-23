<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class AdminPostsController extends Controller
{
    public function index()
    {

        return
            view('admin.posts.index', [
                'posts' => auth()->user()->posts
            ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }
    public function store(Request $request) {
        $attributes =  $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'thumbnail' => 'required|image'
        ]);
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        $path = $request->file('thumbnail')->store('thumbnails');
        $image = Image::make(public_path("storage/{$path}"))->resize('1200', '1200');
        $image->save();
        $attributes['thumbnail'] = $path;
        $attributes['user_id'] = auth()->id();
        $attributes['slug'] = $slug;
        Post::create($attributes);
        return redirect('/');
    }
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

public function update(Post $post) {

    $attributes =  \request()->validate([
        'title' => 'required',
        'excerpt' => 'required',
        'body' => 'required',
        'category_id' => ['required', Rule::exists('categories', 'id')],
        'thumbnail' => 'nullable|image'
    ]);
    if (isset($attributes['thumbnail'])) {
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
    }
    $post->update($attributes);
    return redirect()->back()->with('success', 'Post updated!');
}

public function destroy(Post $post) {
        $post->delete();
    return redirect()->back()->with('success', 'Post deleted!');

}













}
