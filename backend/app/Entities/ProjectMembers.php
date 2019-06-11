<?php

namespace ProjectManager\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ProjectMembers.
 *
 * @package namespace ProjectManager\Entities;
 */
class ProjectMembers extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id',
        'user_id' 
    ];

    public function members()
    {
      return $this->belongsToMany(User::class,'project_members','project_id','user_id');
    } 

}
