<?php

use Illuminate\Database\Seeder;
use App\Style;

class StyleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Style::create(['name'=>"U-Shape"]);
        Style::create(['name'=>"Banquet"]);
        Style::create(['name'=>"Cocktail"]);
        Style::create(['name'=>"Theatre"]);
        Style::create(['name'=>"Classroom"]);
        Style::create(['name'=>"Boardroom"]);
        Style::create(['name'=>"Cabaret"]);
        Style::create(['name'=>"Herringbone"]);
        Style::create(['name'=>"Lecture Room"]);
       
    }
}
