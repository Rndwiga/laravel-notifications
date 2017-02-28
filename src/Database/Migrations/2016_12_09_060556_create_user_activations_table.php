<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserActivationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('user_activations', function (Blueprint $table) {
              $table->integer('user_id')->unsigned();
              $table->string('token')->index();
              $table->timestamps();
         });
        //add activation column check to users table
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('activated')->default(false)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_activations');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('activated');
        });
    }
}
