<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Users extends Db{
    private $table='users';

    public function __construct($dbh=null){
        parent::__construct($dbh);
    }

    public function findUsers():Array{
        $id = $_POST['users_id'];
        
        $sql = "SELECT *
        FROM users
        WHERE id = '".$id."'";

        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}



