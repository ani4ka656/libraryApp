<?php

use Illuminate\Database\Seeder;

class MyBooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\MyBook', 10)->create();
    }
}
