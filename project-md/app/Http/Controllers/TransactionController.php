<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\Category;
use App\Transaction;
use Auth;
use Mail;
use App\User;

class TransactionController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('transaction.create')->withArticle($article)->withCategories($categories);
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
        'datum'         => 'required',
        'uur'           =>   'required',
        'comment'          => 'required'
        
        
        ));
        
        $transaction = new Transaction();
        
        
        $transaction->user_giver_id = $request->user_giver_id;
        $transaction->user_reciever_id = Auth::user()->id;
        $transaction->article_id = $request->article_id;
        $transaction->datum = $request->datum;
        $transaction->uur = $request->uur;
        $transaction->comment = $request->comment;
        
        if ($transaction->save()) {
            
            $user_giver = User::find($request->user_giver_id);
            $user_reciever = User::find(Auth::user()->id);
            
            Mail::send('emails.email_for_giver', ['user_giver' => $user_giver, 'user_reciever' => $user_reciever], function ($message) use ($user_giver)
            {
                
                $message->from('dailymunch1@gmail.com', 'DailyMunch');
                
                $message->to($user_giver['email'])->subject('DailyMunch');
                
            });
            
            Mail::send('emails.email_for_reciever', ['user_giver' => $user_giver, 'user_reciever' => $user_reciever], function ($message) use ($user_reciever)
            {
                
                $message->from('dailymunch1@gmail.com', 'DailyMunch');
                
                $message->to($user_reciever['email'])->subject('DailyMunch');
                
            });
            
            session()->flash('success','Done .. !!');
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
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //
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
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
    }
}