<?php

use Illuminate\Database\Seeder;

class BarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bars')->insert([
            'node' => 461399795,
            'keywords' => 'anchoas;centollo;salmón;pimientos;salazón',
        ]);
    }
}
