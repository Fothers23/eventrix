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
            $table->integer('venue_specs');
            $table->integer('value');
            $table->integer('sector');
            $table->integer('proj_max_capacity');
            $table->integer('ptoj_exhibition');
            $table->integer('proj_break_outs');
            $table->string('preferred_month');
            $table->integer('year_interval');
            $table->integer('proj_participants');
            $table->integer('proj_days');
            $table->integer('proj_rooms');
            $table->bigInteger('lead_id');
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
