<?php namespace Cristabel\Scaffolding\Exceptions;

use Exception;

class ResolveModelConfigException extends Exception {
    
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
