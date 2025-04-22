<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'caption' => 'nullable|string|max:2200',
            'location' => 'nullable|string|max:100',
            'media' => 'required|array|max:10',
            'media.*' => 'mimes:jpg,jpeg,png,gif,mp4,mov,avi|max:20480', // 20MB max
        ]);

        DB::transaction(function () use ($validated, $request) {
            $post = $request->user()->posts()->create([
                'caption' => $validated['caption'],
                'location' => $validated['location'],
            ]);

            foreach ($validated['media'] as $index => $file) {
                $path = $file->store('posts', 'public');
                
                $post->media()->create([
                    'file_path' => $path,
                    'type' => str_starts_with($file->getMimeType(), 'video') ? 'video' : 'image',
                    'order' => $index,
                ]);
            }
        });

        return redirect()->back()->with('success', 'Post created successfully!');
    }

     public function show(Post $post)
     {
        return response()->json([
            'data' => $post->load(['user', 'media', 'likes']),
        ]);
     }
}
