<?php
namespace ProjectManager\Transformers;

use League\Fractal\TransformerAbstract;
use ProjectManager\Entities\ProjectFile;
/**
* Class ProjectFileTransformer
* @package namespace ProjectManager\Transformers;
*/
class ProjectFileTransformer extends TransformerAbstract
{
    /**
    * Transform the \ProjectFile entity
    * @param \ProjectFile $model
    *
    * @return array
    */
    public function transform(ProjectFile $model)
    {
        return [
            'id'         => (int) $model->id,
            /* place your other model properties here */
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}