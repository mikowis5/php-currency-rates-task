<?php

namespace App\Http\Response;

class BadRequestResponse extends BaseResponse
{

    protected static $statusCode = 400;

    protected static $exitAfterOutput = true;

}