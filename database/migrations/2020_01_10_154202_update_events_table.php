<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
           
            $table->integer('participants')->nullable();
            $table->longText('research_notes')->nullable(); 
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->bigInteger('event_status_id')->nullable();
            $table->bigInteger('venue_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            //
        });
    }
}
