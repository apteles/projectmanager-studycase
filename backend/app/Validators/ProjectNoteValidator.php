<?php
namespace ProjectManager\Validators;

use Prettus\Validator\LaravelValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class ProjectNoteValidator extends LaravelValidator
{
    protected $rules = [

        ValidatorInterface::RULE_CREATE => [
           
        ],
        
        ValidatorInterface::RULE_UPDATE => [
          
        ]
       
    ];
}