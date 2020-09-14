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
//        factory(User::class, 100)->create();
        factory(\App\User::class, 30)->create();

//        for ($i = 1; $i < 30; $i++){
//            \App\User::create([
//                'email' => Faceto
//            ])
//        }
    }
}
