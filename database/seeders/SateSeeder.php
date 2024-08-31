<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $state = State::create([
            'country_id' => $country->id, 'name' => 'Florida',
            'country_id' => $country->id, 'name' => 'Gujarat'
        ]);
    }
}
