<?php
namespace ProjectManager\Validators;

use Prettus\Validator\LaravelValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class ClientValidator extends LaravelValidator
{
    protected $rules = [

        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|max:255',
            'responsible' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        ],
        
        ValidatorInterface::RULE_UPDATE => [
           'name' => 'max:255',
           'responsible' => 'max:255',
           'email' => 'email',
        ]
       
    ];
}