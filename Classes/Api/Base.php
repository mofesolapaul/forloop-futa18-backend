<?php
/**
 * @author
 * Banjo Mofesola Paul
 * Chief Developer, Planet NEST
 * mofesolapaul@planetnest.org
 * 24/03/2018 08:10
 */

namespace Api;


class Base
{
    public $method, $entity, $endpoint, $args, $request;

    public function __construct($request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");

        #!- fetch the args
        $this->args = explode('/', $request);
        $this->dieTest();
    }

    /**
     * Tests if an exception must be thrown, based on args length
     */
    private function dieTest()
    {
        if (count($this->args) == 0) die($this->_response("Invalid API request", 404));
    }
}