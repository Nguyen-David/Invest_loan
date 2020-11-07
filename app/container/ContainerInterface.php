<?php

namespace app\container;

use Psr\Container\ContainerInterface as PsrContainerInterface;

/**
 * Interface ContainerInterface
 * @package app\container
 */
interface ContainerInterface extends PsrContainerInterface{
    /**
     * @param $key
     * @param $value
     * @param $type
     * @return void
     */
    public function set( $key, $value,  $type );

    /**
     * @param string $key
     * @param $value
     * @param string $type
     * @return void
     */
    public function reset($key, $value, $type);


}