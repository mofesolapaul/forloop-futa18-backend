<?php

abstract class Apiable
{

    /**
     * Tells if supplied method name exists
     * @param $method_name
     * @return bool
     */
    public function hasMethod($method_name) {
        return method_exists($this, $method_name);
    }
}