<?php

/**
 * @author
 * Banjo Mofesola Paul
 * Chief Developer, Planet NEST
 * mofesolapaul@planetnest.org
 * 24/03/2018 09:55
 */
class Auth
{
    use \Traits\DbTransaction;
    use \Traits\HttpMethodCheck;

    public function index($request) {
//        $this->_checkMethod('POST', $request->method);
        $keys = generateAuthTokens();
        setcookie(COOKIE_AUTH_DIGEST, $keys['auth_digest'], strtotime("+100 days"), '', '', false, true);
        return $keys;
    }
}