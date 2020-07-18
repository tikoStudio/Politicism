<?php

include_once(__DIR__ . "/Db.php");
include_once(__DIR__ . "/User.php");

class UserCash extends User
{
    private $transferAmount;

    public function getTransferAmount()
    {
        return $this->transferAmount;
    }

    public function setTransferAmount($transferAmount)
    {
        $this->transferAmount = $transferAmount;

        return $this;
    }

    public function cashFromBank()
    {
        //db conn
        $conn = Db::getConnection();
        //insert query
        $preStatement = $conn->prepare("select * from users where token= :token");
        $token = $this->getToken();

        $preStatement->bindParam(":token", $token);

        $preStatement->execute();
        $preResult = $preStatement->fetch(PDO::FETCH_ASSOC);

        $statement = $conn->prepare("update users set bank= :bank, cash= :cash where token= :token");
       
        $transferAmount = $this->getTransferAmount();
        $preBank = $preResult['bank'];
        $preCash = $preResult['cash'];

        $bank = $preBank - $transferAmount;
        $cash = $preCash + $transferAmount;
        

        $statement->bindParam(":token", $token);
        $statement->bindParam(":bank", $bank);
        $statement->bindParam(":cash", $cash);
 
        //return result
        $statement->execute();

        $afterStatement = $conn->prepare("select * from users where token= :token");

        $afterStatement->bindParam(":token", $token);

        $afterStatement->execute();
        $afterResult = $afterStatement->fetch(PDO::FETCH_ASSOC);
    
        return $afterResult;
    }

    public function bankFromCash()
    {
        //db conn
        $conn = Db::getConnection();
        //insert query
        $preStatement = $conn->prepare("select * from users where token= :token");
        $token = $this->getToken();

        $preStatement->bindParam(":token", $token);

        $preStatement->execute();
        $preResult = $preStatement->fetch(PDO::FETCH_ASSOC);

        $statement = $conn->prepare("update users set bank= :bank, cash= :cash where token= :token");
       
        $transferAmount = $this->getTransferAmount();
        $preBank = $preResult['bank'];
        $preCash = $preResult['cash'];

        $bank = $preBank + $transferAmount;
        $cash = $preCash - $transferAmount;
        

        $statement->bindParam(":token", $token);
        $statement->bindParam(":bank", $bank);
        $statement->bindParam(":cash", $cash);
 
        //return result
        $statement->execute();

        $afterStatement = $conn->prepare("select * from users where token= :token");

        $afterStatement->bindParam(":token", $token);

        $afterStatement->execute();
        $afterResult = $afterStatement->fetch(PDO::FETCH_ASSOC);
    
        return $afterResult;
    }
}
