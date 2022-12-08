<?php

namespace Database\Seeders;

use App\Models\Cgy;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CgySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cgy::truncate();

        for($i = 0; $i < 100; $i++)
            Cgy::create(['subject' => '主題', 'enabled' => true]);
    }
}
