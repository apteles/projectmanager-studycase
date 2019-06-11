<?php

use Illuminate\Database\Seeder;
use ProjectManager\Entities\ProjectTask;

class ProjectTaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(ProjectTask::class,10)->create(); 
    }
}