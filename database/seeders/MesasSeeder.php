<?php

namespace Database\Seeders;

use App\Models\Mesas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MesasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 15; $i++){
            Mesas::create([
                'id'                      => $i,
                'name'               => 'Mesa '.$i,
            ]);
        }
    }
}
