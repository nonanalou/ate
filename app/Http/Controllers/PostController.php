<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function create(Project $project)
    {
        return view('posts.new', ['project' => $project]);
    }

    public function store(Request $request, Project $project)
    {
        $values = $request->validate([
            'title' => 'required|max:40|min:2',
            'content' => 'required',
        ]);
        $post = Post::create([
            'title' => $values['title'],
            'content' => $values['content'],
            'published' => Date::now(),
            'project_id' => $project->id,
            'author_id' => auth()->user()->id,
        ]);
        Log::info("Post '{$post->title}' has been created");
        return redirect()->route('post', $post);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        $values = $request->validate([
            'title' => 'required|max:40|min:2',
            'content' => 'required',
        ]);
        $post->title = $values['title'];
        $post->content = $values['content'];
        $post->save();
        Log::info("Post '{$post->title}' has been updated");
        return redirect()->route('post', $post);
    }
}
