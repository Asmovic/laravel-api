<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostsApiController extends Controller
{
    //
    public function index() {
        return Posts::all();
    }

    public function create() {
        request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
    
        return Posts::create([
            'title' => request('title'),
            'content' => request('content')
        ]);
    }

    public function update(Posts $post) {
        request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        
        $success = $post->update([
            'title' => request('title'),
            'content' => request('content')
        ]);
    
        return [
            'success' => $success
        ];
    }

    public function destroy(Posts $post) {
        $success = $post->delete();
    return [
        'success' => $success,
        'message' => 'Post deleted successfully!!',
    ];
    }
}
