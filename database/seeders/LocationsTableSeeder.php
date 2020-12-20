<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            'London',
            'Manchester',
            'Liverpool',
            'Birmingham',
        ];

        foreach ($locations as $location) {
            $slug = Str::slug($location);
            $locationObject = Location::create([
                'name' => $location,
                'slug' => $slug
            ]);

            $locationObject->addMediaFromUrl(asset('images/locations/' . $slug . '.jpg'))->toMediaCollection('photo');
        }
    }
}
