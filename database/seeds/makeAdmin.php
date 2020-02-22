<?php

use Illuminate\Database\Seeder;

class makeAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \App\Admin::create(['name' => "admin","email" => "a@a.com",'password' => bcrypt(123456789)]);
    }
}
