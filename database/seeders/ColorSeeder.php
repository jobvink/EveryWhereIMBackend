<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create(['name' => 'green', 'hex_code' => '#00FF00']);
        Color::create(['name' => 'red', 'hex_code' => '#FF0000']);
        Color::create(['name' => 'blue', 'hex_code' => '#0000FF']);
        Color::create(['name' => 'yellow', 'hex_code' => '#FFFF00']);
    }
}
