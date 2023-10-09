<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        tap(User::firstOrCreate(
            ['name' => 'Admin','email' => 'admin@travel.test'],           
            ['password' => 'qwerty@123'],
        ), function(User $user){
            if($user->wasRecentlyCreated)
                // Newly Created
                $user->ownedTeams()->save(Team::forceCreate([
                    'user_id' => $user->id,
                    'name' => explode(' ', $user->name, 2)[0]."'s Team",
                    'personal_team' => true,
                ]));
        });
    }
}
