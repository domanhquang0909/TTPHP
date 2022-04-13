<?php

use Illuminate\Database\Seeder;

class Classrooms extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Classrooms::class,10)->create();
    }
}
