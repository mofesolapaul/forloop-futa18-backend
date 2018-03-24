<?php

namespace Traits;

use Db;

/**
 * @author
 * Banjo Mofesola Paul
 * Chief Developer, Planet NEST
 * mofesolapaul@planetnest.org
 * 24/03/2018 09:48
 */
trait DbTransaction
{
    protected $db;

    public function _init()
    {
        $this->db = Db::init();
    }
}