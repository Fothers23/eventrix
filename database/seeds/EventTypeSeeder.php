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
        EventType::create(['name'=>"Seminars"]);
        EventType::create(['name'=>"Conferences"]);
        EventType::create(['name'=>"Trade Shows"]);
        EventType::create(['name'=>"Workshops"]);
        EventType::create(['name'=>"Reunions"]);
        EventType::create(['name'=>"Parties"]);
        EventType::create(['name'=>"Galas"]);
        EventType::create(['name'=>"Expo"]);
        EventType::create(['name'=>"Exhibition"]);
        EventType::create(['name'=>"Convention"]);
        EventType::create(['name'=>"Symposium"]);
        EventType::create(['name'=>"Summit"]);
    }
}
