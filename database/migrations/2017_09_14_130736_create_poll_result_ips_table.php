<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollResultIpsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('poll_result_ips', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('poll_result_id')->references('id')
            ->on('age_limit_polls')->onDelete('cascade');
            $table->string('country');
            $table->string('countryCode');
            $table->string('regionName');
            $table->string('region');
            $table->string('city');
            $table->string('zip')->nullable();
            $table->string('lat');
            $table->string('lon');
            $table->string('timezone');
            $table->string('isp');
            $table->string('org');
            $table->string('as');
            $table->string('query');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('poll_result_ips');
    }
}
