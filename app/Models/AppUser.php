<?php
//! You can set up a nickname
namespace App\Models;
use PDO;
use App\Utils\Database;

class AppUser extends CoreModel
{

    private	$nickname;
    private	$password;

    public function update()
    {
    }

    public function insert()
    {
    }

    public static function delete()
    {
    }

    public static function find()
    {
    }

    public static function findAll()
    {
    }
    
    public static function save()
    {
        
    }
    /**
     * Get the value of nickname
     */ 
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set the value of nickname
     *
     * @return  self
     */ 
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }


    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public static function findByNickname($nickname)
    {
       
                // se connecter à la BDD
                $pdo = Database::getPDO();

                // écrire notre requête
                $sql = 
                '
                SELECT * 
                FROM `app_user`
                WHERE
                `nickname` = :nickname' ;
        
                //On prépare les données
                
                $query = $pdo->prepare($sql);

                
                $query->bindValue('email', $nickname, PDO::PARAM_STR);
                //bindparam sert pour plusieurs valeurs à bind
                
                $query->execute();
                //if($query->rowCount() == 1) {

                //* ici ele fetchObject renvoi nativement ou un objet ou false
                    $user = $query->fetchObject(__CLASS__);
                    return $user;
                //}
                //return false;

                

                      
    }




}
