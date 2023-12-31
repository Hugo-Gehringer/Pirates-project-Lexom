<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Part;
use App\Models\Ressource;
use App\Models\Ship;
use App\Models\Treasure;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
        Ship::factory(5)->create();

        $parts = Part::all();
        $ships = Ship::all();

        $ships->each(function ($ship) use ($parts) {
            foreach ($parts as $part){
                $ship->parts()->attach($part, ['condition'=>rand(10,100)]);
            }
        });

        $roleSailor = Role::create(['name' => 'sailor']);
        $permissions = Permission::pluck('id','id')->all();

        $roleSailor->syncPermissions($permissions);

        $users = User::factory(40)->create();
        $users->each(function ($user) use ($roleSailor) {
            $user->assignRole([$roleSailor->id]);
        });

        $roleCaptain = Role::create(['name' => 'captain']);
        $permissions = Permission::pluck('id','id')->all();
        $roleCaptain->syncPermissions($permissions);

        $ships->each(function ($ship) use ($roleCaptain) {
            $captain = User::factory()->create(['ship_id'=>$ship->id]);
            $captain->assignRole([$roleCaptain->id]);
        });

        Ressource::factory(50)->create();

        Treasure::factory(50)->create();
    }
}
