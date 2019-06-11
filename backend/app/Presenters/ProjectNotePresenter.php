<?php

namespace ProjectManager\Presenters;

use ProjectManager\Transformers\ProjectNoteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProjectNotePresenter
 *
 * @package namespace ProjectManager\Presenters;
 */
class ProjectNotePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProjectNoteTransformer();
    }
}