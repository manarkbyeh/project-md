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
use App\User;
use App\Http\Requests\ArticleRequest;

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
        $categories = Category::all();
        return view('Articles.index')->withArticles($articles)->withCategories($categories);
    }
    
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function myarticles()
    {
        
        $articles = Article::where('user_id' , Auth::User()->id)->get();
        $categories = Category::all();
        return view('Articles.myarticles')->withArticles($articles)->withCategories($categories);
    }
    
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function GetCat($id)
    {
        
        $articles = Article::where('category_id' , $id)->get();
        $categories = Category::all();
        return view('Articles.index')->withArticles($articles)->withCategories($categories);
    }
    
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function search(Request $request)
    {
        
        $articles = Article::where('title' ,'like','%'.$request->search.'%')
        ->orWhere('category_id','=',Category::where('name'  ,'like','%'.$request->search.'%')->pluck('id')->first())->get();
        session()->flash('success','results for '.$request->search);
            $categories = Category::all();
        return view('Articles.index')->withArticles($articles)->withCategories($categories);
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
    public function store(ArticleRequest $request)
    {
        
        $articles = new Article();
        if ($request->hasFile('pic')) {
            $pic = $request->file('pic');
            
            $fileName = time() . '.'.$pic->getClientOriginalExtension();
            if (Image::make($pic)->save(public_path('images/'.$fileName))) {
                $articles->pic = $fileName;
            }
        }
        
        $articles->title = $request->title;
        $articles->text = $request->text;
        $articles->category_id = $request->category_id;
        
        $articles->user_id = auth()->user()->id;
        if ($articles->save()) {
            
            session()->flash('success','Article added successfuly !!');
            return redirect('/myarticles');
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
        $articles = Article::findOrFail($id);
        $categories = Category::all();
        return view('Articles.show')->withArticles($articles)->withCategories($categories);
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
        $this->authorize('update',$articles);
        $categories = Category::all();
        return view('Articles.edit')->withArticles($articles)->withCategories($categories);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(ArticleRequest $request, $id)
    {
        
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
            session()->flash('success','Article Updated successfuly !!');
            return redirect('myarticles');
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
        session()->flash('success','Article Deleted successfuly !!');
        return redirect('myarticles');
        
        
    }
}