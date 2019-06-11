<?php
use Illuminate\Database\Seeder;
use ProjectManager\Entities\User;

class UsersTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);
        
        factory(User::class,9)->create();
      
    }
}