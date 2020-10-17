<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        /*\App\Models\User::factory(1)->create()->each(function($user){
            $user->roles()->attach(1);
         });*/
        DB::table('roles')->insert(array(
            array(
            'name' => 'Admin',
            'slug' => 'admin',
            ),
            array(
            'name' => 'Client',
            'slug' => 'client',
            ),
        ));
        
    }
}
