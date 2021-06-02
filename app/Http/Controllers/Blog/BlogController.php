<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function posts() {
        $userId = Auth::user()->id;
        $result = Post::where('user_id', $userId)->paginate();
        return response()->json($result, 200);
    }

    public function postsId($id) {
        $userId = Auth::user()->id;
        $result = Post::all()->where('user_id', $userId)->find($id);
        return response()->json($result, 200);
    }

    public function postSave(PostRequest $req) {
        $userId = Auth::user()->id;
        $req->user_id = $userId;
        $post = Post::create($req);
        return response()->json($post, 201);
    }

    public function postEdit(PostRequest $req, Post $post) {
        $post->update($req);
        return response()->json($post, 201);
    }

    public function deletePost(Request $req, Post $post){
        $userId = Auth::user()->id;
        if ($userId == $post->user_id) {
            $post->delete();
            return response()->json('', 204);
        }
        return response()->json('',403);
    }
}
