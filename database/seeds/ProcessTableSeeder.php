<?php

use Illuminate\Database\Seeder;

class ProcessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Process::class, 500)->create();
    }
}
