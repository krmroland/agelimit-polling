<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgeLimitPollsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('age_limit_polls', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('choice');
            $table->string('phoneNumber')->nullable();
            $table->string('two_factor_user_id')->nullable();
            $table->boolean('verified_phone_number')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('age_limit_polls');
    }
}
