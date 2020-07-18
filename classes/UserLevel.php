<?php

include_once(__DIR__ . "/Db.php");
include_once(__DIR__ . "/User.php");

class UserLevel extends User
{
    public function userLevelData()
    {
        //db conn
        $conn = Db::getConnection();
        //insert query
        $statement = $conn->prepare("select level from users where token= :token");
        $token = $this->getToken();

        $statement->bindParam(":token", $token);
 
        //return result
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
        //insert query
        $statement2 = $conn->prepare("select * from levels where id= :level");
        $level = ++$result['level'];
        
        $statement2->bindParam(":level", $level);

        //return result
        $statement2->execute();
        $result2 = $statement2->fetch(PDO::FETCH_ASSOC);

        return $result2;
    }
}
