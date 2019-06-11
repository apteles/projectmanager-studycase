<?php
use Illuminate\Database\Seeder;
use ProjectManager\Entities\OAuthClient;

class OAuthClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(OAuthClient::class,1)->create();
    }
    
}
