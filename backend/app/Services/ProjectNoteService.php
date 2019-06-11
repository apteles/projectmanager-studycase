<?php
namespace ProjectManager\Services;

use ProjectManager\Repositories\ProjectNoteRepository;
use ProjectManager\Validators\ProjectNoteValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;

class ProjectNoteService
{
    protected $repositoryProjectNote;

    protected $validatorProjectNote;

    public function __construct(ProjectNoteRepository $pn, ProjectNoteValidator $v)
    {
        $this->repositoryProjectNote = $pn;

        $this->validatorProjectNote = $v;
    }

    public function create(array $data)
    {
        return $this->repositoryProjectNote->create($data);
    }

    public function update(array $data, string $id)
    {
        return $this->repositoryProjectNote->update($data, $id);
    }


    public function save(array $data, string $id = null)
    {
        try{
            
            $rule = $id ? ValidatorInterface::RULE_UPDATE : ValidatorInterface::RULE_CREATE;

            $this->validatorProjectNote->with($data)->passesOrFail($rule);
            
            if(!$id) {
              return $this->create($data);
            }

            return $this->update($data,$id);
            
        } catch(ValidatorException $e){
           
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }
}