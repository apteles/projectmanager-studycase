<?php

namespace ProjectManager\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ProjectManager\Repositories\ProjectNoteRepository;
use ProjectManager\Entities\ProjectNote;
use ProjectManager\Validators\ProjectNoteValidator;

/**
 * Class ProjectNoteRepositoryEloquent.
 *
 * @package namespace ProjectManager\Repositories;
 */
class ProjectNoteRepositoryEloquent extends BaseRepository implements ProjectNoteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectNote::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
