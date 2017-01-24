<?php

use Illuminate\Database\Seeder;

class CatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('talents')->insert([
            'title'   => 'Actor',
            'preview'   => 'Actor',
            'slug'   => 'actor',
        ]);
        DB::table('talents')->insert([
            'title'   => 'Singer',
            'preview'   => 'Singer',
            'slug'   => 'singer',
        ]);
        DB::table('talents')->insert([
            'title'   => 'Model',
            'preview'   => 'Model',
            'slug'   => 'model',
        ]);
        DB::table('talents')->insert([
            'title'   => 'Photographer',
            'preview'   => 'Photographer',
            'slug'   => 'photographer',
        ]);
    }
}
