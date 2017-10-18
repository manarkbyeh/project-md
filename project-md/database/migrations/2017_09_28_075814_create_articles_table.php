<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title");
            $table->string("pic")->default('default.jpg');
            $table->text("text");
<<<<<<< HEAD
            $table->date('datum');
=======
            $table->string("locatie");
            $table->date('datum');
            $table->string("tijdstip");
>>>>>>> 232f49e662bbbc2b8c2320066660948992c5bc3f
            $table->integer("user_id");
            $table->integer("active")->default(0);
            $table->timestamps();
            
        });
    }
    
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}