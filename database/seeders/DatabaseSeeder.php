<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use function PHPSTORM_META\map;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //create admin user
        $user = \App\Models\User::create([
            'name' => 'Admin',
            
            'email' => 'admin@admin.com',
            'password' => bcrypt('Alfa512#'),
            'group' => 1,

        ]);
    }
}
