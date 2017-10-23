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
use App\Http\Requests\CreateRequest;
use App\Http\Requests\EditRequest;
use Carbon\Carbon;
class articlesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $current_date = Carbon::now();
        
        $current_date = $current_date->toDateString();
        $articles = Article::where('datum', '>=',  $current_date)->where('active', '=', 0)->paginate(2);
    
        $categories = Category::all();
        return view('Articles.index')->withArticles($articles)
		->withCategories($categories);
    }
    
    public function active($id){
        
       
            try{
                $articles = Article::find($id);
                if($articles){
                    $articles->active = 1;
                    $articles->save();
                }else{
                    echo 'false';
                    exit;
                }
            }catch(Exception $e) {
                echo 'false';
            }
            echo 'true';
        
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
    
    public function myOrders()
    {
        $articles = Article::selectRaw('*')
        ->join('transactions', 'articles.id', '=', 'transactions.article_id')
        ->where('transactions.user_reciever_id' , '=',Auth::User()->id)->get();
        
        $categories = Category::all();
        return view('Articles.myorders')->withArticles($articles)->withCategories($categories);
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
        
        $articles = Article::where('title' ,'like','%'.$request->search.'%')->orWhere('locatie','like','%'.$request->search.'%')->orWhere('datum','like','%'.$request->search.'%')->orWhere('text','like','%'.$request->search.'%')
        ->orWhere('category_id','=',Category::where('name'  ,'like','%'.$request->search.'%')->pluck('id')->first())->get();
       
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
    public function store(CreateRequest $request)
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
        $articles->datum = $request->datum;
        $articles->latLngLat = $request->latLngLat;
        $articles->latLngLng = $request->latLngLng;

        $articles->tijdstip = $request->tijdstip;
        $articles->category_id = $request->category_id;
     
        
        $articles->user_id = auth()->user()->id;
        if ($articles->save()) {
            
            session()->flash('success','Uw munchie werd toegevoegd!');
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
        $article = Article::findOrFail($id);
        $articles = Article::where('category_id', '=', $article->category_id)->where('id', '!=', $article->id)->take(4)->get();
        $categories = Category::all();

        $user = User::where('id', '=', $article->user_id);
        return view('Articles.show')->withArticle($article)->withArticles($articles)->withCategories($categories)->withUser($user);
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
    public function update(EditRequest $request, $id)
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
        $articles->datum = $request->datum;
        $articles->latLngLat = $request->latLngLat;
        $articles->latLngLng = $request->latLngLng;
        $articles->tijdstip = $request->tijdstip;
        $articles->text = $request->text;
        $articles->category_id = $request->input('category_id');
        
        $articles->user_id = Auth::user()->id;
        if(  $articles->save()){
            session()->flash('success','Uw munchie werd geupdate!');
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
        session()->flash('success','Uw munchie werd verwijderd');
        return redirect('myarticles');
        
        
    }
}