<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Talent;
use App\Location;
class LinkSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();
		foreach (range(1,20) as $index) {
			$location=Location::all()->random(1);
			$talent=Talent::all()->random(1);
			DB::table('links')->insert([
				'title'   =>$talent->title.' in '.$location->title,
				'talent_id'=>$talent->id,
				'location_id'=>$location->id,
				]);
		}
	}
}
