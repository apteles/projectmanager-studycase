<?php

namespace ProjectManager\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ProjectManager\Repositories\ProjectMembersRepository;
use ProjectManager\Entities\ProjectMembers;
use ProjectManager\Validators\ProjectMembersValidator;

/**
 * Class ProjectMembersRepositoryEloquent.
 *
 * @package namespace ProjectManager\Repositories;
 */
class ProjectMembersRepositoryEloquent extends BaseRepository implements ProjectMembersRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectMembers::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
