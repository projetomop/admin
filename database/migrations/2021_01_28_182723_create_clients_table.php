<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
  
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('cpf')->unsigned();
            $table->string('email')->unique();;
            $table->string('telephone');
            $table->string('street');
            $table->string('district');
            $table->string('city');
            $table->string('state');
            $table->string('image')->default('image_user.png');
            $table->string('password')->nullable();
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
