<?php
namespace ProjectManager\Transformers;

use League\Fractal\TransformerAbstract;
use ProjectManager\Entities\ProjectNote;

/**
* Class ProjectNotePresenterTransformer
* @package namespace ProjectManager\Transformers;
*/
class ProjectNoteTransformer extends TransformerAbstract
{
    /**
    * Transform the \ProjectNote entity
    * @param \ProjectNote $model
    *
    * @return array
    */
    
    public function transform(ProjectNote $model)
    {
        return [
            /* place your other model properties here */
            'project_id' => (int) $model->project_id, 
            'title'   => $model->title,
            'note'   => $model->note,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
