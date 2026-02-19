<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;
use Illuminate\Support\Str;

class LocationSeeder extends Seeder
{
    public function run()
    {
        $locations = [
            [
                'city' => 'Toronto',
                'state' => 'ON',
                'zip_codes' => 'M4B,M5J,M6H,M2N',
                'manager_email' => 'toronto.mgr@rehobothcleaning.ca',
                'address' => '100 University Ave, Toronto, ON M5J 1V6',
                'phone_number' => '+1 (416) 555-0123'
            ],
            [
                'city' => 'Vancouver',
                'state' => 'BC',
                'zip_codes' => 'V6B,V5K,V6Z,V7Y',
                'manager_email' => 'vancouver.mgr@rehobothcleaning.ca',
                'address' => '666 Burrard St, Vancouver, BC V6C 2X8',
                'phone_number' => '+1 (604) 555-0199'
            ],
            [
                'city' => 'Calgary',
                'state' => 'AB',
                'zip_codes' => 'T2P,T3A,T2G,T2N',
                'manager_email' => 'calgary.mgr@rehobothcleaning.ca',
                'address' => '888 3rd St SW, Calgary, AB T2P 5C5',
                'phone_number' => '+1 (403) 555-0144'
            ],
            [
                'city' => 'Ottawa',
                'state' => 'ON',
                'zip_codes' => 'K1P,K2P,K1R',
                'manager_email' => 'ottawa.mgr@rehobothcleaning.ca',
                'address' => '150 Elgin St, Ottawa, ON K2P 1L4',
                'phone_number' => '+1 (613) 555-0177'
            ],
        ];

        foreach ($locations as $loc) {
            Location::create([
                'city' => $loc['city'],
                'slug' => Str::slug($loc['city']),
                'state' => $loc['state'],
                'zip_codes' => $loc['zip_codes'],
                'manager_email' => $loc['manager_email'],
                'address' => $loc['address'],
                'phone_number' => $loc['phone_number'],
            ]);
        }
    }
}
