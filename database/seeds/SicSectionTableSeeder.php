<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

use App\SicSection;

class SicSectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * 
     *  Source: https://www.ons.gov.uk/methodology/classificationsandstandards/ukstandardindustrialclassificationofeconomicactivities/uksic2007
     *
     *
     * @return void
     */
    
    public function run()
    {
        SicSection::create([
            
            'name' => 'AGRICULTURE, FORESTRY AND FISHING',
            'code' => 'A'
        ]);

        SicSection::create([
            
            'name' => 'MINING AND QUARRYING',
            'code' => 'B'
        ]);

        SicSection::create([
            
            'name' => 'MANUFACTURING',
            'code' => 'C'
        ]);

        SicSection::create([
            
            'name' => 'ELECTRICITY, GAS, STEAM AND AIR CONDITIONING SUPPLY',
            'code' => 'D'
        ]);

        SicSection::create([
            
            'name' => 'WATER SUPPLY; SEWERAGE, WASTE MANAGEMENT AND REMEDIATION ACTIVITIES',
            'code' => 'E'
        ]);

        SicSection::create([
            
            'name' => 'CONSTRUCTION',
            'code' => 'F'
        ]);

        SicSection::create([
            
            'name' => 'WHOLESALE AND RETAIL TRADE; REPAIR OF MOTOR VEHICLES AND MOTORCYCLES',
            'code' => 'G'
        ]);

        SicSection::create([
            
            'name' => 'TRANSPORTATION AND STORAGE',
            'code' => 'H'
        ]);

        SicSection::create([
            
            'name' => 'ACCOMMODATION AND FOOD SERVICE ACTIVITIES',
            'code' => 'I'
        ]);

        SicSection::create([
            
            'name' => 'INFORMATION AND COMMUNICATION',
            'code' => 'J'
        ]);

        SicSection::create([
            
            'name' => 'FINANCIAL AND INSURANCE ACTIVITIES',
            'code' => 'K'
        ]);

        SicSection::create([
            
            'name' => 'REAL ESTATE ACTIVITIES',
            'code' => 'L'
        ]);

        SicSection::create([
            
            'name' => 'PROFESSIONAL, SCIENTIFIC AND TECHNICAL ACTIVITIES',
            'code' => 'M'
        ]);

        SicSection::create([
            
            'name' => 'ADMINISTRATIVE AND SUPPORT SERVICE ACTIVITIES',
            'code' => 'N'
        ]);

        SicSection::create([
            
            'name' => 'PUBLIC ADMINISTRATION AND DEFENCE; COMPULSORY SOCIAL SECURITY',
            'code' => 'O'
        ]);

        SicSection::create([
            
            'name' => 'EDUCATION',
            'code' => 'P'
        ]);

        SicSection::create([
            
            'name' => 'HUMAN HEALTH AND SOCIAL WORK ACTIVITIES',
            'code' => 'Q'
        ]);

        SicSection::create([
            
            'name' => 'ARTS, ENTERTAINMENT AND RECREATION',
            'code' => 'R'
        ]);

        SicSection::create([
            
            'name' => 'OTHER SERVICE ACTIVITIES',
            'code' => 'S'
        ]);

        SicSection::create([
            
            'name' => 'ACTIVITIES OF HOUSEHOLDS AS EMPLOYERS; UNDIFFERENTIATED GOODS-AND SERVICES-PRODUCING ACTIVITIES OF HOUSEHOLDS FOR OWN USE',
            'code' => 'T'
        ]);

        SicSection::create([
            
            'name' => 'ACTIVITIES OF EXTRATERRITORIAL ORGANISATIONS AND BODIES',
            'code' => 'U'
        ]);
    }
}

