<?php

namespace ProjectManager\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ProjectNote.
 *
 * @package namespace ProjectManager\Entities;
 */
class ProjectNote extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id',
        'title',
        'note'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }


}
