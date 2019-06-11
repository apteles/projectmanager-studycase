<?php
namespace ProjectManager\Services;

use ProjectManager\Repositories\ProjectRepository;
use ProjectManager\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Filesystem\Factory as Storage;

class ProjectService
{
    protected $repositoryProject;

    protected $validatorProject;

    protected $filesystem;

    protected $storage;

    public function __construct(ProjectRepository $client, ProjectValidator $validator, Filesystem $filesystem, Storage $storage)
    {
        $this->repositoryProject = $client;

        $this->validatorProject = $validator;

        $this->filesystem = $filesystem;

        $this->storage = $storage;
    }

    public function create(array $data)
    {
        return $this->repositoryProject->create($data);
    }

    public function update(array $data, string $id)
    {
        return $this->repositoryProject->update($data, $id);
    }


    public function save(array $data, string $id = null)
    {
        try{
            
            $rule = $id ? ValidatorInterface::RULE_UPDATE : ValidatorInterface::RULE_CREATE;

            $this->validatorProject->with($data)->passesOrFail($rule);
            
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

    public function createFile(array $data)
    {
        $project = $this->repositoryProject->skipPresenter()->find($data['project_id']);
        $projectFile = $project->files()->create($data);
        
        return $this->storage->put("{$projectFile->id}.{$data['extension']}", $this->filesystem->get($data['file']));
    }

    public function addMember()
    {
        # code...
    }

    public function removeMember()
    {
        # code...
    }

    public function isMember()
    {
        # code...
    }
}