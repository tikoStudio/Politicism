<?php

include_once(__DIR__ . "/Db.php");
include_once(__DIR__ . "/User.php");

class UserPerks extends User
{
    private $perkAmount;
    private $perkType;

    public function getPerkAmount()
    {
        return $this->perkAmount;
    }

    public function setPerkAmount($perkAmount)
    {
        $this->perkAmount = $perkAmount;

        return $this;
    }

    public function getPerkType()
    {
        return $this->perkType;
    }

    public function setPerkType($perkType)
    {
        $this->perkType = $perkType;

        return $this;
    }
    
    public function getPerks()
    {
        // get old data
        //db conn
        $conn = Db::getConnection();
        //insert query
        $preStatement = $conn->prepare("select * from users where token= :token");
        $token = $this->getToken();

        $preStatement->bindParam(":token", $token);

        $preStatement->execute();
        $preResult = $preStatement->fetch(PDO::FETCH_ASSOC);
    
        //update perk and perksUsed
        $statement = $conn->prepare("update users set perksUsed= :perkUsed, perkWar= :perkWar, perkEconomy= :perkEconomy, perkManagement= :perkManagement where token= :token");
        $oldPerkUsed = $preResult["perksUsed"];
        $perkAmount = $this->getPerkAmount();
        $perksUsed = $oldPerkUsed + $perkAmount;

        $usedPerkType = $this->getPerkType();

        $perkWar = $preResult['perkWar'];
        $perkEconomics = $preResult['perkEconomy'];
        $perkManagement = $preResult['perkManagement'];

        $statement->bindParam(":token", $token);
        $statement->bindParam(":perkUsed", $perksUsed);

        switch ($usedPerkType) {
            case 'war':
                $newPerkWar = $perkWar + $perkAmount;
                $statement->bindParam(":perkWar", $newPerkWar);

                $statement->bindParam(":perkEconomy", $perkEconomics);
                $statement->bindParam(":perkManagement", $perkManagement);
            break;
            case 'economics':
                $newPerkEconomics = $perkEconomics + $perkAmount;
                $statement->bindParam(":perkEconomy", $newPerkEconomics);

                $statement->bindParam(":perkWar", $perkWar);
                $statement->bindParam(":perkManagement", $perkManagement);
            break;
            case 'management':
                $newPerkManagament = $perkManagement + $perkAmount;
                $statement->bindParam(":perkManagement", $newPerkManagament);

                $statement->bindParam(":perkWar", $perkWar);
                $statement->bindParam(":perkEconomy", $perkEconomics);
            break;
        }

        $statement->execute();
        //get new data to display
        $afterStatement = $conn->prepare("select * from users where token= :token");
        $token = $this->getToken();

        $afterStatement->bindParam(":token", $token);

        $afterStatement->execute();
        $afterResult = $afterStatement->fetch(PDO::FETCH_ASSOC);

        return $afterResult;
    }

    public function perkTimer()
    {
        //db conn
        $conn = Db::getConnection();
        //insert query
        $statement = $conn->prepare("insert into perksBought (userId, perksUsed, perkType, time) values (:userId, :perksUsed, :perkType, :time)");
        $userId = 5;
        $perksUsed = $this->getPerkAmount();
        $perkType = $this->getPerkType();
        $time = time();

        $statement->bindParam(':userId', $userId);
        $statement->bindParam(':perksUsed', $perksUsed);
        $statement->bindParam(':perkType', $perkType);
        $statement->bindParam(':time', $time);

        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
    }
}
