<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;

class MainController extends Controller
{
    public function index()
    {
//        $cat = new Category();
//        $cat->title = 'привет';
//        $cat->slag = 'dddd';
//        $cat->save();
        $user = auth()->user();
        return view('admin.index', compact('user'));
    }
}


