<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\User;
use Session;
use Auth;
class RolesController extends Controller
{
    public function index(){
        
        $users = user::all();
        return view("roles",["users"=>$users]);
        
        return Redirect::to("/");
        
    }
    
    
    
    
    
    
}