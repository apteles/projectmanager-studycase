<?php
namespace ProjectManager\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

use ProjectManager\Entities\Project;
use ProjectManager\Presenters\ProjectPresenter;

class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    public function model()
    {
        return Project::class;
    }

    public function hasMember($project_id)
    {
        $project = $this->find($project_id);
        
        foreach ($project->members as $member) {
            if($member->id == \Authorizer::getResourceOwnerId()){
               return true; 
            }
        }

        return false;
    }

    public function isOwner($project_id)
    {
        if(count($this->findWhere([ 'id' => $project_id, 'owner_id' => \Authorizer::getResourceOwnerId()]))){
            return true;
        }

        return false;
    }

    public function presenter()
    {
        return ProjectPresenter::class;
    }
    
}