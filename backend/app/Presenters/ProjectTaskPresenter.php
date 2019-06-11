<?php
namespace ProjectManager\Presenters;

use ProjectManager\Transformers\ProjectTaskTransformer;
use Prettus\Repository\Presenter\FractalPresenter;
/**
* Class ProjectTaskPresenter
*
* @package namespace ProjectManager\Presenters;
*/
class ProjectTaskPresenter extends FractalPresenter
{
    /**
    * Transformer
    *
    * @return \League\Fractal\TransformerAbstract
    */
    public function getTransformer()
    {
        return new ProjectTaskTransformer();
    }
}
