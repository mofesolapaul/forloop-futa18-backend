<?php

namespace Api;
use Test;

/**
 * @author
 * Banjo Mofesola Paul
 * Chief Developer, Planet NEST
 * mofesolapaul@planetnest.org
 * 24/03/2018 08:08
 */

class v1 extends Base
{
    protected $classmap = [
        'test' => Test::class
    ];

    public function __construct($request)
    {
        parent::__construct($request);
    }
}