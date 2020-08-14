<?php

include_once(__DIR__ . "/Db.php");

class User
{
    protected $id;
    protected $email;
    protected $username;
    protected $password;
    protected $avatar;
    protected $xp;
    protected $level;
    protected $perksUsed;
    protected $perkWar;
    protected $perkEconomy;
    protected $perkPolitics;
    protected $cash;
    protected $bank;
    protected $currentRegionId;
    protected $lastLogin;
    protected $active;
    protected $ip;
    protected $token;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }
 
    public function setEmail($email)
    {
        if (empty($email)) {
            throw new Exception("Email is required to make an account!");
        }

        $this->email = $email;

        return $this;
    }

    public function validEmail()
    {
        $email = $this->getEmail();
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public function availableEmail($email)
    {
        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $statement->bindParam(":email", $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result == false) {
            // Email available
            return true;
        } else {
            // Email not available
            return false;
        }
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        if (empty($username)) {
            throw new Exception("Username is required to make an account!");
        }

        $this->username = $username;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        if (empty($password)) {
            throw new Exception("Password is required to make an account!");
        }

        $options = ['cost' => 12];
        $password = password_hash($password, PASSWORD_DEFAULT, $options);

        $this->password = $password;

        return $this;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getXp()
    {
        return $this->xp;
    }
 
    public function setXp($xp)
    {
        $this->xp = $xp;

        return $this;
    }

    public function getCash()
    {
        return $this->cash;
    }
 
    public function setCash($cash)
    {
        $this->cash = $cash;

        return $this;
    }

    public function getCurrentRegionId()
    {
        return $this->currentRegionId;
    }

    public function setCurrentRegionId($currentRegionId)
    {
        $this->currentRegionId = $currentRegionId;

        return $this;
    }

    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    public function getBank()
    {
        return $this->bank;
    }

    public function setBank($bank)
    {
        $this->bank = $bank;

        return $this;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    public function getPerksUsed()
    {
        return $this->perksUsed;
    }

    public function setPerksUsed($perksUsed)
    {
        $this->perksUsed = $perksUsed;

        return $this;
    }

    public function getPerkWar()
    {
        return $this->perkWar;
    }

    public function setPerkWar($perkWar)
    {
        $this->perkWar = $perkWar;

        return $this;
    }

    public function getPerkEconomy()
    {
        return $this->perkEconomy;
    }

    public function setPerkEconomy($perkEconomy)
    {
        $this->perkEconomy = $perkEconomy;

        return $this;
    }

    public function getPerkPolitics()
    {
        return $this->perkPolitics;
    }

    public function setPerkPolitics($perkPolitics)
    {
        $this->perkPolitics = $perkPolitics;

        return $this;
    }
}
