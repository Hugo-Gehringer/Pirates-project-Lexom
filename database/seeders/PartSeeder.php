<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partList = ["coque","mât de misaine","Grand mât", "cachots","cabines","gouvernail","voiles","pavillon","pont principal"];
        foreach ($partList as $part){
            DB::table('parts')->insert([
                'name' => $part,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
