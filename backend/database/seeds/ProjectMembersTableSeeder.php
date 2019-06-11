<?php
use Illuminate\Database\Seeder;
use ProjectManager\Entities\ProjectMembers;

class ProjectMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(ProjectMembers::class,10)->create();
    }
}