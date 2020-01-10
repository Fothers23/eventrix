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
    
    
    {// Happened / To tender / Planned for future
        EventStatus::create(['name'=>"Past"]);
        EventStatus::create(['name'=>"Tender"]);
        EventStatus::create(['name'=>"Upcoming"]);

    }

    
}
