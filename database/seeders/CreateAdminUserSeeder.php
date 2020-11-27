<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!User::where('email', 'admin@admin.com')->first()) {
            $user = User::create([
                'name' => 'admin', 
                'email' => 'admin@admin.com',
                'password' => bcrypt('password')
            ]);
            
            $user->assignRole('super-admin');    
        }
    }
}
