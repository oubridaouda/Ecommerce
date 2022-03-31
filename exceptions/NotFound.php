<?php

namespace Exceptions;

use Throwable;

class NotFound extends \Exception
{

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }


    public function error404()
    {
        http_response_code(404);
        require VIEWS . '404-error/index.php';
    }

}