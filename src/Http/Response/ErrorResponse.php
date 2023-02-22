<?php

namespace App\Http\Response;

class ErrorResponse extends BaseResponse
{

    protected static $statusCode = 500;

    protected static $exitAfterOutput = true;

}