<?php

namespace Database\Seeders;

use App\Models\UrlType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UrlTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UrlType::create([
            'type' => 'tny'
        ]);
        UrlType::create([
            'type' => 'rnm'
        ]);
    }
}
