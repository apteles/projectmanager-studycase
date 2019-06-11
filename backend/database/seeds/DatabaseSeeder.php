<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ClientsSeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(ProjectMembersTableSeeder::class);
        $this->call(ProjectNoteTableSeeder::class);
        $this->call(ProjectTaskTableSeeder::class);
        $this->call(OAuthClientSeeder::class);

    }
}
