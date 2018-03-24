<?php

/**
 * @author
 * Banjo Mofesola Paul
 * Chief Developer, Planet NEST
 * mofesolapaul@planetnest.org
 * 24/03/2018 09:54
 */
class Lecturer
{
    use \Traits\DbTransaction;
    use \Traits\HttpMethodCheck;
    use \Traits\AuthenticatesUser;

    public function index($request)
    {
        $this->_auth($request->request);
        $q = Db::q("SELECT * FROM lecturers");
        if (!$q->execute()) response("Unable to fetch lecturers list.", 404);
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($request)
    {
        $this->_checkMethod("POST", $request->method);
        $this->_auth($request->request);
        $q = Db::q("INSERT INTO `lecturers` (`name`, `reg_date`) VALUES (?,?)");
        if (!$q->execute($request->$request)) response("Unable to create lecturer.", 404);
    }
}