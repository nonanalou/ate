<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\File;
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
            'attachments' => 'nullable',
            'attachments.*' => 'mimes:jpg,jpeg,docx,png,pdf'
        ]);


        $post = Post::create([
            'title' => $values['title'],
            'content' => $values['content'],
            'published' => Date::now(),
            'project_id' => $project->id,
            'author_id' => auth()->user()->id,
        ]);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $attachment) {
                $name = $attachment->getClientOriginalName();
                $type = $attachment->getClientMimeType();
                $path = $attachment->store('public/attachments');

                Attachment::create([
                    'name' => $name,
                    'type' => $type,
                    'path' => $path,
                    'post_id' => $post->id,
                ]);
            }
        }

        Log::info("Post '{$post->title}' has been created");
        return redirect()->route('post', $post);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }
}
