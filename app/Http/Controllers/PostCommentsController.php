<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post): RedirectResponse
    {
        request()->validate([
            'comment' => 'required'
        ]);
      $post->comments()->create([
          'user_id' => auth()->id(),
          'comment' => request('comment')
      ]);
      return back()->with('success', 'Your comment has been posted!');
    }





}
