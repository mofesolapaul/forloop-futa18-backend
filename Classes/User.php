<?php

/**
 * @author
 * Banjo Mofesola Paul
 * Chief Developer, Planet NEST
 * mofesolapaul@planetnest.org
 * 24/03/2018 09:54
 */
class User
{
    use \Traits\DbTransaction;
    use \Traits\HttpMethodCheck;
    use \Traits\AuthenticatesUser;

    public function index($request) {
//        $this->_checkMethod("POST", $request->method);
        $this->_auth($request->request);
        return "Users!";
    }
}