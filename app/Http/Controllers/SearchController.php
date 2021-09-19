<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request){
        $request->validate([
            's' => 'required'
        ]);
        $categories_list = Category::has('posts')->with('posts')->withCount('posts')->orderBy('posts_count','desc')->paginate(5);//сортировка категорий
        $s = $request->s;
        $posts = Post::where('title', 'LIkE', "%{$s}%")->paginate(2);
        return view('search.show', compact('posts', 's', 'categories_list'));
    }
}
