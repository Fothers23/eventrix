<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name')->unique();
            $table->char('country_code', 2)->nullable();
            $table->longText('description')->nullable();
            $table->string('website_url')->nullable();
            $table->integer('max_capacity')->nullable();
            $table->integer('break_out_room_total')->nullable();
            $table->integer('floor_sqm')->nullable();
            $table->point('location')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venues');
    }
}
