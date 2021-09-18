<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostContruller extends Controller
{


    public function index (){
        $categories_list = Category::has('posts')->with('posts')->withCount('posts')->orderBy('posts_count','desc')->paginate(5);//сортировка категорий по количеству записей у пользователей
        $posts = Post::with('category')->orderBy('id', 'desc')->paginate(2);
        return view('posts.index', compact('posts','categories_list'));
    }
    public function show ($slug){
        $categories_list = Category::has('posts')->with('posts')->withCount('posts')->orderBy('posts_count','desc')->paginate(5);//сортировка категорий по количеству записей у пользователей
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->views += 1;
        $post->update();
        return view('posts.show', compact('post' ,'categories_list'));
    }
}
