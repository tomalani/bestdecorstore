<?php

namespace Database\Seeders;


use App\Models\Users;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Users::factory(30)->create();
    }
}