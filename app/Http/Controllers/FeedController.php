<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FeedController extends Controller
{
    public function index() {
        $suggestedUser = User::query()->where('id', '<>', auth()->id())->get();
        $posts = Post::with([
                'user' => function($query) {
                    $query->select('id', 'username', 'profile_picture');
                },
            'media',
            'likes',
            ])
            ->latest()
            ->paginate(10);

        return Inertia::render('Home/Index', [
            'suggestedUser' => $suggestedUser,
            'posts' => PostResource::collection($posts)
        ]);
    }
}
