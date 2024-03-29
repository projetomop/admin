<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            // $table->string('type');
            $table->string('description');
            $table->foreignId('profission_id')->constrained('profissions');
            $table->foreignId('client_id')->constrained('clients');
            $table->enum('status', ['waiting', 'progress','marked','canceled'])->nullable()->default('waiting');
            $table->timestamps();
            // $table->dateTime('receive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
