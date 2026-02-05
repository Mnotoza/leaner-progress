<?php

namespace App\Exceptions;

use Exception;

class LearnerNotFoundException extends Exception
{
    public function __construct($message = 'Learner not found', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
