<?php
namespace ProjectManager\Services;

use ProjectManager\Repositories\ClientRepository;
use ProjectManager\Validators\ClientValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;

class ClientService
{
    protected $repositoryClient;

    protected $validatorClient;

    public function __construct(ClientRepository $client, ClientValidator $validator)
    {
        $this->repositoryClient = $client;

        $this->validatorClient = $validator;
    }

    public function create(array $data)
    {
        return $this->repositoryClient->create($data);
    }

    public function update(array $data, string $id)
    {
        return $this->repositoryClient->update($data, $id);
    }


    public function save(array $data, string $id = null)
    {
        try{
            
            $rule = $id ? ValidatorInterface::RULE_UPDATE : ValidatorInterface::RULE_CREATE;

            $this->validatorClient->with($data)->passesOrFail($rule);
            
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