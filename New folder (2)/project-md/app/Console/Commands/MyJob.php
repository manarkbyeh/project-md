<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
class MyJob extends Command
{
    /**
    * The name and signature of the console command.
    *
    * @var string
    */
    protected $signature = 'do:myjob';
    
    
    /**
    * The console command description.
    *
    * @var string
    */
    protected $description = 'MyJob';
    
    /**
    * Create a new command instance.
    *
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
    * Execute the console command.
    *
    * @return mixed
    */
    public function handle()
    {
        echo"Starting job\n";        $user = new User();        $user->name = "testcron";        $user->email = "testtest@testtest.be";  $user->password = "1";       $user->save();echo"Job done\n";
        
    }
}