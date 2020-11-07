<?php


namespace app\container;

use Psr\Container\ContainerExceptionInterface;

/**
 * Class ContainerException
 * @package housedi\exceptions
 */
class ContainerException extends \Exception implements ContainerExceptionInterface
{

    /**
     * ContainerException constructor.
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, \Throwable $previous = null)
    {
        $message = "Container error: unable to resolve {$message}.";
        parent::__construct($message, $code, $previous);
    }

}