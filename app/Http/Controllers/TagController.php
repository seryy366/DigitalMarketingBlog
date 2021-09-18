<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($slug){
        $categories_list = Category::has('posts')->with('posts')->withCount('posts')->orderBy('posts_count','desc')->paginate(5);//сортировка категорий по количеству записей у пользователей
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->with('category')->orderBy('id', 'desc')->paginate(2);
        return view('tags.show', compact('tag','posts', 'categories_list'));
    }
}
