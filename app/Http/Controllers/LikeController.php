<?php

namespace App\Http\Controllers;

use App\Models\Post;

class LikeController extends Controller
{
    public function __invoke(Post $post)
    {
        $user = auth()->user();

        if ($post->likedBy($user)) {
            $post->likes()->detach($user->id);
            $liked = false;
        } else {
            $post->likes()->attach($user->id);
            $liked = true;
        }

        return response()->json([
                'message' => $liked ? 'Liked successfully' : 'Like removed',
                'liked' => $liked,
                'likes_count' => $post->likes()->count(),
            ]);
    }
}
