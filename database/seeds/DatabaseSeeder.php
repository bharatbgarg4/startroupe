<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CatTableSeeder::class);
        $this->call(LocationTableSeeder::class);
        $this->call(UserTableSeeder::class);
        // $this->call(LinkSeeder::class);
        // $this->call(JobSeeder::class);

        Model::reguard();
    }
}
