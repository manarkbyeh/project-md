<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

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


        $current_date = Carbon::now();
        
        $current_date = $current_date->toDateString();
        $articles = Article::where('datum', '>=',  $current_date)->orderby('datum','ASC')->where('active', 0)->limit(3)->get();
      
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