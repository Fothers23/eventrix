<?php

use Illuminate\Database\Seeder;
use App\EventStatus;

class EventStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventStatus::create(['status'=>"Past"]);
        EventStatus::create(['status'=>"Tender"]);
        EventStatus::create(['status'=>"Upcoming"]);
    }
}
