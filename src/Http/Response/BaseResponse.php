<?php

namespace App\Http\Response;

abstract class BaseResponse
{

    /**
     * Response's http status code.
     *
     * @var int
     */
    protected static $statusCode = 200;

    /**
     * List of headers to be included in response.
     * Expected form of array: ['header-key' => 'header-value']
     *
     * @var array
     */
    protected static $headers = [];

    /**
     * If flag is set to true, output will terminate further
     * response handling.
     *
     * @var bool
     */
    protected static $exitAfterOutput = false;


    private static function setHeaders()
    {
        foreach (static::$headers as $key => $value)
        {
            header("{$key}: {$value}");
        }
    }

    protected static function getOutput($data)
    {
        return $data;
    }

    public final static function output($data)
    {
        http_response_code(static::$statusCode);
        self::setHeaders();
        echo static::getOutput($data);
        if(static::$exitAfterOutput)
        {
            exit;
        }
    }

}