<?php

namespace ProjectManager\Presenters;

use ProjectManager\Transformers\ProjectFileTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProjectFilePresenter
 *
 * @package namespace ProjectManager\Presenters;
 */
class ProjectFilePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProjectFileTransformer();
    }
}