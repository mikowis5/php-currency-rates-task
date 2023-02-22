<?php

namespace App\Http\Response;

class JsonErrorResponse extends ErrorResponse
{

    protected static $headers = [
        'Content-Type' => 'application/json; charset=utf-8'
    ];

    protected static function getOutput($data)
    {
        if(is_array($data))
        {
            $data = json_encode($data);
        }
        return $data;
    }

}