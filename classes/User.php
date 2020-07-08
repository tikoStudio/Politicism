<?php

include_once(__DIR__ . "/Db.php");

class Map
{
    protected $email;
    protected $username;
    protected $password;
    protected $avatar;
    protected $xp;
    protected $cash;
    protected $currentRegionId;
    protected $lastLogin;
    protected $active;
    protected $ip;
    protected $token;

    public function getEmail()
    {
        return $this->email;
    }
 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
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
}
