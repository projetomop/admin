<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cpf')->unique();
            $table->string('email')->unique();
            $table->string('telephone');
            $table->string('cep');
            $table->string('street');
            $table->string('district');
            $table->string('city');
            $table->string('state');
            $table->foreignId('profission_id')->constrained('profissions');
            $table->string('image')->default('image_user.png');
            $table->string('password')->nullable();
            $table->string('type')->nullable()->default('provider');
            $table->longText('curriculum')->nullable();
            $table->boolean('confirmed')->nullable()->default(false);
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
        Schema::dropIfExists('providers');
    }
}
