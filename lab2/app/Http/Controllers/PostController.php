<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Показать всех пользователей приложения.
     *
     * @return \Illuminate\Http\Response
     */
    public function showWithFilter(Request $request)
    {
        $titleFilter = $request->input('titleFilter');
        $tagFilter = $request->input('tagFilter');
        $codeFilter = $request->input('codeFilter');
        if ($tagFilter != "" || $titleFilter != "" || $codeFilter != "") {
            $posts = Post::where('post.title', 'like', '%' . $titleFilter . '%') 
            ->where('post.code', 'like', '%' . $codeFilter . '%')   
            ->whereHas('tag', function ($tag) use ($tagFilter) { $tag->where('title', 'like', '%' . $tagFilter . '%');})
            ->paginate(15);
        }
        else {
            $posts = Post::paginate(15);
        }

        return view('post')->with('posts', $posts);
    }

    public function showWithCode($code) {
        $curPost = Post::where('code', '=', $code)->firstOrFail();
        $tags = $curPost->tag()->orderBy('title', 'asc')->get();
        return view('postcode')->with('curPost', $curPost)->with('tags', $tags);
    }
}