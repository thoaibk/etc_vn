<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\User::firstOrCreate([
            'email' => 'admin@admin.com',
        ],[
            'name' => 'Admin',
            'password' => Hash::make('123456'),
        ]);

        $admin->syncRoles('admin');

//        if(\App\User::query()->count() == 1){
//            factory(\App\User::class, 30)->create();
//        }
    }
}
