<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Input;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Image;
use App\Article;
use App\Category;
use Session;

class articlesController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        
        $articles = Article::all();
        return view('Articles.index', compact('articles'));
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $categories=Category::all();
        return view('Articles.create')->withCategories($categories);
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        
        
        $this->validate($request, array(
        'pic' =>'image|mimes:jpeg,png,jpg,gif|',
        'title' => 'required|max:225',
        'category_id'   => 'required|integer',
        'text' => 'required',
        ));
        
        
        $articles = new Article();
        if ($request->hasFile('pic')) {
            $pic = $request->file('pic');
            
            $fileName = time() . '.'.$pic->getClientOriginalExtension();
            // 'images/cars/' . $filename;
            if (Image::make($pic)->save(public_path('images/'.$fileName))) {
                $articles->pic = $fileName;
            }
        }
        
        $articles->title = $request->title;
        $articles->text = $request->text;
        $articles->category_id = $request->category_id;
        
        $articles->user_id = auth()->user()->id;
        if ($articles->save()) {
            Session::flash('success', 'The blog articles was successfully save!');
        }
        
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view("Articles.show", compact("article"));
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $articles = Article::find($id);
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        return view('Articles.edit')->withArticles($articles)->withCategories($cats);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
        'pic' =>'image|mimes:jpeg,png,jpg,gif|',
        'title' => 'required|max:225',
        'text' => 'required',
        'category_id' => 'required|integer',
        ));
        
        
        $articles = Article::find($id);
        if($request->hasFile('pic')){
            $pic = $request->file('pic');
            $fileName = time() . '.'.$pic->getClientOriginalExtension();
            // 'images/cars/' . $filename;
            if(Image::make($pic)->save(public_path('images/'.$fileName))){
                $articles->pic = $fileName;
            }
        }
        
        
        $articles->title = $request->title;
        $articles->text = $request->text;
        $articles->category_id = $request->input('category_id');
        
        $articles->user_id = Auth::user()->id;
        if(  $articles->save()){
            Session::flash('success', 'This articles was successfully saved.');
        }
        
        
        
        
        
        
        
    }
    
    
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function delete($id)
    {
        $articles = Article::find($id);
        return view('Articles.delete')->withArticles( $articles);
    }
    public function destroy($id)
    {
        $articles = Article::find($id);
        $articles_id= $articles->id;
        $articles->delete();
        
        
        
    }
}