<?php

use Illuminate\Database\Seeder;

class EventStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventStatus::create(['name'=>"Past"]);
        EventStatus::create(['name'=>"Tender"]);
        EventStatus::create(['name'=>"Upcoming"]);
    }
}
