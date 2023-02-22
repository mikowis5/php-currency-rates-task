<?php

namespace App\Http\Response;

class JsonBadRequestResponse extends BadRequestResponse
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