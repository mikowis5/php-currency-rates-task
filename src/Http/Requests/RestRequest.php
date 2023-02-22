<?php

namespace App\Http\Requests;

use App\Http\Response\JsonBadRequestResponse;
use Rakit\Validation\Validator;

abstract class RestRequest
{

    /**
     * @var Validator
     */
    private $validator;

    /**
     * Validation rules that apply to the request
     *
     * @var array
     */
    protected $rules = [];

    /**
     * Will stay empty if validation was successful
     *
     * @var array
     */
    protected $errors = [];


    public function __construct()
    {
        $this->validator = new Validator;
    }

    protected function getInputs() : array
    {
        return [];
    }

    public function validate() : bool
    {
        $validation = $this->validator->validate($this->getInputs(), $this->rules);
        $validation->validate();

        if($validation->fails())
        {
            $exception = new RequestInvalidException();
            $exception->errors = $validation->errors()->toArray();
            throw $exception;
        }
        return true;
    }

}