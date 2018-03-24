<?php

/**
 * @author
 * Banjo Mofesola Paul
 * Chief Developer, Planet NEST
 * mofesolapaul@planetnest.org
 * 24/03/2018 09:13
 */
class Test
{
    use \Traits\DbTransaction;

    public function __construct()
    {
        $this->_init();
    }

    public function index($request) {
        return "Test Index {$request->method}";
    }
}