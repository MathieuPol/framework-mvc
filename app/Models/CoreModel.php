<?php

namespace App\Models;


abstract class CoreModel
{
//! Need role to set up acl
    protected $role;

    
    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
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
    //* Create Read Update Delete
    //* you need at least these function to interact with your database
    abstract public function insert(); 
    abstract public function update();


    abstract public static function find();
    abstract public  static function findAll();

    abstract public static function delete();
}