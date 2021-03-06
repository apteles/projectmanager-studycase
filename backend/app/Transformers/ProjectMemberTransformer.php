<?php
namespace ProjectManager\Transformers;

use ProjectManager\Entities\User;
use League\Fractal\TransformerAbstract;

class ProjectMemberTransformer extends TransformerAbstract
{
    public function transform(User $member)
    {
        return [
            'id' => $member->id,
            'name' => $member->name,
        ];
    }
}