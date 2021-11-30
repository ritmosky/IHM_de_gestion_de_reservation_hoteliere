<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 35);
            $table->string('last_name', 45);
            $table->string('address', 50);
            $table->string('code_postal', 5);
            $table->string('ville', 35);
            $table->string('num_ID', 11);
            $table->string('contact')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guests');
    }
}
