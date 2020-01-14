<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_scores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('venue_specs')->nullable();
            $table->integer('value')->nullable();
            $table->integer('sector')->nullable();
            $table->integer('proj_max_capacity')->nullable();
            $table->integer('proj_exhibition')->nullable();
            $table->integer('proj_break_outs')->nullable();
            $table->string('preferred_month')->nullable();
            $table->integer('year_interval')->nullable();
            $table->integer('proj_participants')->nullable();
            $table->integer('proj_days')->nullable();
            $table->integer('proj_rooms')->nullable();
            $table->bigInteger('lead_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_scores');
    }
}
