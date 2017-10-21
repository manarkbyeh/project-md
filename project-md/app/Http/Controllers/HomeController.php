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
        $articlesMarker = Article::all();
		
		    $markers_arr = [] ;
			
		    if($articlesMarker){
			   
			   foreach($articlesMarker as $key => $value ) : 
			     
				$marker = [ $value->id , $value->latlngLng , $value->latlngLat  ] ; 
				
				// push info to array 
				$markers_arr[] = $marker ; 
				
				unset($marker) ;
				
			   
			   endforeach ;
			   
		    }  
            $markers = json_encode($markers_arr) ;
        $categories = Category::all();
        return view('welcome')->withArticles($articles)
		                      ->withCategories($categories)
							  ->withMarkers($markers);

    }
}