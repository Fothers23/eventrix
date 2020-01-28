<?php

use Illuminate\Database\Seeder;
use App\EventType;


class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventType::create(['name'=>"Seminar"]);
        EventType::create(['name'=>"Conference"]);
        EventType::create(['name'=>"Trade Show"]);
        EventType::create(['name'=>"Workshop"]);
        EventType::create(['name'=>"Reunion"]);
        EventType::create(['name'=>"Party"]);
        EventType::create(['name'=>"Gala"]);
        EventType::create(['name'=>"Expo"]);
        EventType::create(['name'=>"Exhibition"]);
        EventType::create(['name'=>"Convention"]);
        EventType::create(['name'=>"Symposium"]);
        EventType::create(['name'=>"Summit"]);
        EventType::create(['name'=>"Fundraiser"]);
        EventType::create(['name'=>"Presentation"]);
        EventType::create(['name'=>"Film Festival"]);
        EventType::create(['name'=>"Product Launch"]);
        EventType::create(['name'=>"Fashion Show"]);
        EventType::create(['name'=>"Networking"]);
        EventType::create(['name'=>"Pop Up Event"]);
        EventType::create(['name'=>"PR Event"]);
        EventType::create(['name'=>"Press Conference"]);
        EventType::create(['name'=>"Promotional Event"]);
        EventType::create(['name'=>"Screening"]);
        EventType::create(['name'=>"Congress"]);
        EventType::create(['name'=>"Other"]);
    }
}
