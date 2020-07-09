<?php

include_once(__DIR__ . "/Db.php");

class Map
{
    private $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    
    public function allRegionData()
    {
        //db conn
        $conn = Db::getConnection();
        //insert query
        $statement = $conn->prepare("select * from regions where id = :id");
        $id = $this->getId();
        $statement->bindParam(":id", $id);

        //return result
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
            
        return $result;
    }

    public function getRegionsStateData()
    {
        //db conn
        $conn = Db::getConnection();
        //insert query
        $statement = $conn->prepare("select * from regions where id = :id");
        $id = $this->getId();
        $statement->bindParam(":id", $id);
 
        //return result
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
             
        $statement2 = $conn->prepare("select * from states where id = :stateId");
        $statement2->bindParam(":stateId", $result['stateId']);

        //return result
        $statement2->execute();
        $result2 = $statement2->fetch(PDO::FETCH_ASSOC);

        // return $result2;
        return $result2;
    }
}
