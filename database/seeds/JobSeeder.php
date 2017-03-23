<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class JobSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create('en_IN');
		foreach (range(1,80) as $index) {
			DB::table('jobs')->insert([
				'title'   =>$faker->sentence,
				'budget'	=> $faker->numberBetween(300,40000),
				'talent_id'=>$faker->numberBetween(1,4),
				'location_id'=>$faker->numberBetween(1,12),
				'user_id'=>$faker->numberBetween(1,8),
				'content' =>$faker->text,
				'created_at'=>\Carbon\Carbon::now(),
				'updated_at'=>\Carbon\Carbon::now(),
				]);
		}
	}
}
