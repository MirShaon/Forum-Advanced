<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([

              'name'     => 'admin',
              'password' => bcrypt('password'),
              'email'    => 'admin@gmail.com',
              'admin'    => 1,
              'avatar'   =>asset('avatars/avatar1.png')

        ]);
        
        App\User::create([

              'name'     => 'adam',
              'password' => bcrypt('password'),
              'email'    => 'admin@admin.com',
              'avatar'   =>asset('avatars/avatar1.png')

        ]);
    }
}
