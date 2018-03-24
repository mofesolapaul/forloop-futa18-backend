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
    // $method: HTTP method, $resource: resource, $endpoint: method
    public $method, $args;
    protected $resource, $endpoint;
    protected $classmap= [
//        'users' => \Users::class
    ];

    public function __construct($request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");

        #!- fetch the pieces: expects entity/endpoint/{args}
        $this->args = sanitize( preg_split('#/#', $request, -1, PREG_SPLIT_NO_EMPTY));
        $this->resource = array_shift($this->args);
        $this->endpoint= array_shift($this->args) ?? 'index'; // use index as default
        $this->shouldThrowError();

        $this->method = determineHttpMethod();
    }

    public function execute() {
        $resource = $this->makeResource($this->resource);
        if ( method_exists($resource, $this->endpoint) )
            response($resource->{$this->endpoint}($this));

        response("No endpoint: {$this->endpoint}", 404);
    }

    private function makeResource($classname) {
        $classname = strtolower($classname);
        if (!array_key_exists($classname, $this->classmap))
            response("Invalid resource", 404);
        return new $this->classmap[$classname];
    }

    /**
     * Tests if an exception must be thrown, based on presence of necessary parts
     */
    private function shouldThrowError()
    {
        if (!$this->resource || !$this->endpoint) response("Invalid API request", 400);
    }
}