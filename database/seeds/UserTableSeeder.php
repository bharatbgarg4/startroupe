<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class UserTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function image(){
		$faker = Faker::create('en_IN');
		return $faker->imageUrl($width = 640, $height = 480);
		$image=$faker->image('./public/uploads/seed',400, 400);
		return explode("public", $image)[1];
	}
	public function run()
	{
		$faker = Faker::create('en_IN');
		DB::table('users')->insert([
			'name'   => 'Bharat Garg',
			'bio'   => $faker->sentence,
			'username'   => 'bharat',
			'email'      => 'bharatbgarg4@gmail.com',
			'mobile'=>$faker->mobile,
			'imgUrl'    => $this->image(),
			'talent_id'=>$faker->numberBetween(1,4),
			'location_id'=>$faker->numberBetween(1,12),
			'password'   => bcrypt('qwert'),
			'facebook'   => 'facebook.com/bharat',
			'admin'   => true,
			'editor'   => true,
			'created_at'=>\Carbon\Carbon::now(),
			'updated_at'=>\Carbon\Carbon::now(),
			'viewed'=>\Carbon\Carbon::now(),
			]);
		DB::table('users')->insert([
			'name'   => 'Himanshu Vasistha',
			'bio'   => $faker->sentence,
			'username'   => 'himanshu',
			'email'      => 'himanshu.vasistha@gmail.com',
			'mobile'=>$faker->mobile,
			'imgUrl'    => $this->image(),
			'talent_id'=>$faker->numberBetween(1,4),
			'location_id'=>$faker->numberBetween(1,12),
			'password'   => bcrypt('qwert'),
			'admin'   => true,
			'editor'   => true,
			'created_at'=>\Carbon\Carbon::now(),
			'updated_at'=>\Carbon\Carbon::now(),
			'viewed'=>\Carbon\Carbon::now(),
			]);
		DB::table('users')->insert([
			'name'   => 'Param',
			'bio'   => $faker->sentence,
			'username'   => 'param',
			'email'      => 'kalra.parampreetsingh@gmail.com',
			'mobile'=>$faker->mobile,
			'imgUrl'    => $this->image(),
			'talent_id'=>$faker->numberBetween(1,4),
			'location_id'=>$faker->numberBetween(1,12),
			'password'   => bcrypt('qwert'),
			'admin'   => true,
			'editor'   => true,
			'created_at'=>\Carbon\Carbon::now(),
			'updated_at'=>\Carbon\Carbon::now(),
			'viewed'=>\Carbon\Carbon::now(),
			]);
		foreach (range(1,10) as $index) {
			$name=$faker->name;
			DB::table('users')->insert([
				'name' => $name,
				'bio'   => $faker->sentence,
				'username'=>str_slug($name),
				'email' => $faker->email,
				'mobile'=>$faker->mobile,
				'imgUrl'    => $this->image(),
				'talent_id'=>$faker->numberBetween(1,4),
				'location_id'=>$faker->numberBetween(1,12),
				'password' => bcrypt('qwert'),
				'editor'   => true,
				'created_at'=>\Carbon\Carbon::now(),
				'updated_at'=>\Carbon\Carbon::now(),
				'viewed'=>\Carbon\Carbon::now(),
				]);
		}
		foreach (range(1,100) as $index) {
			$name=$faker->name;
			DB::table('users')->insert([
				'name' => $name,
				'bio'   => $faker->sentence,
				'username'=>str_slug($name),
				'email' => $faker->email,
				'mobile'=>$faker->mobile,
				'imgUrl'    => $this->image(),
				'talent_id'=>$faker->numberBetween(1,4),
				'location_id'=>$faker->numberBetween(1,12),
				'password' => bcrypt('qwert'),
				'created_at'=>\Carbon\Carbon::now(),
				'updated_at'=>\Carbon\Carbon::now(),
				'viewed'=>\Carbon\Carbon::now(),
				]);
		}
	}
}
