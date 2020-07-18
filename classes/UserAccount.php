<?php

include_once(__DIR__ . "/Db.php");
include_once(__DIR__ . "/User.php");

class UserAccount extends User
{
    public function createAccount()
    {
        //db conn
        $conn = Db::getConnection();
        //insert query
        $statement = $conn->prepare("insert into users (email, username, password, avatar, lastLogin, ip, token) values (:email, :username, :password, :avatar, :lastLogin, :ip, :token)");
            
        // get variables to bind
        $email = $this->getEmail();
        $username = $this->getUsername();
        $password = $this->getPassword();
        $avatar = $this->getAvatar();
        $lastLogin = $this->getLastLogin();
        $ip = $this->getIp();
        $hash = md5($email);
        $token = uniqid($hash, true);
            
        // bind variable to input in query in a safe way
        $statement->bindParam(":email", $email);
        $statement->bindParam(":username", $username);
        $statement->bindParam(":password", $password);
        $statement->bindParam(":avatar", $avatar);
        $statement->bindParam(":lastLogin", $lastLogin);
        $statement->bindParam(":ip", $ip);
        $statement->bindParam(":token", $token);

        // execute statement
        $statement->execute();
    }

    public function tokenFromSession($email)
    {
        //db conn
        $conn = Db::getConnection();
        //insert query
        $statement = $conn->prepare("select token, id from users where email = :email");
        $statement->bindParam(":email", $email);

        //return result
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function checkLogin($email, $password)
    {
        //db conn
        $conn = Db::getConnection();
        //insert query
        $statement = $conn->prepare("select * from users where email = :email limit 1");
        $statement->bindParam(":email", $email);

        //return result
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if (empty($result)) {
            return false;
        }
        $hash = $result["password"];
        if (password_verify($password, $hash)) {
            return true;
        } else {
            return false;
        }
    }

    public function AllUserData()
    {
        //db conn
        $conn = Db::getConnection();
        //insert query
        $statement = $conn->prepare("select * from users where token= :token");
        $token = $this->getToken();

        $statement->bindParam(":token", $token);
 
        //return result
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
