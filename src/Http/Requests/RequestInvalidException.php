<?php

namespace App\Http\Requests;

class RequestInvalidException extends \Exception
{

    /**
     * @var array
     */
    public $errors = [];

}