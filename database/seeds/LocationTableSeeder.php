<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_IN');
        foreach (range(1,12) as $index) {
            $city=$faker->city;
            DB::table('locations')->insert([
                'title'   => $city,
                'slug'   => str_slug($city),
                ]);
        }
    }
}
