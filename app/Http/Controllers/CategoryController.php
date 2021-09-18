<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug){
        $categories_list = Category::has('posts')->with('posts')->withCount('posts')->orderBy('posts_count','desc')->paginate(5);//сортировка категорий по количеству записей у пользователей
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts =  $category->posts()->orderBy('id', 'desc')->paginate(2);
        return view('categories.show', compact('category','posts', 'categories_list'));
    }
}
