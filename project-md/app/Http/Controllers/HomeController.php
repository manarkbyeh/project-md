<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */

    
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {


        $articles = Article::orderBy('created_at', 'desc')->limit(3)->get();
  

        $categories = Category::all();
        return view('welcome')->withArticles($articles)->withCategories($categories);

    }
}