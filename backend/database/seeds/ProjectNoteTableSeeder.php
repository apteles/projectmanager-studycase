<?php
use Illuminate\Database\Seeder;
use ProjectManager\Entities\ProjectNote;

class ProjectNoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(ProjectNote::class,50)->create();
    }
}