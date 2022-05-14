<?php
//! Exist for ACL

namespace App\Controllers;

use App\Models\AppUser;
use App\Utils\Flash;

class UserController extends CoreController
{
    /**
     * Méthode s'occupant de générer la page de connection
     *
     * @return void
     */
    public function connection()
    {
 
        $this->show('user/connection');
    }

    public function userList()
    {   


        $userList = AppUser::findAll();
        $this->show('user/userlist',[
            'user_list' => $userList
        ]);
    }

    /**
     * Méthode pour récuperer les données du formulaire et les traiter
     * 
     */




    public function login()
    {

        //* @WARNING Constante à changer avant php 8.1
        $nickname = filter_input(INPUT_POST, 'nickname');
        $password = filter_input(INPUT_POST, 'password');
        
        
        if ($nickname && $password) {

            $user = AppUser::findByNickname($nickname);
            if ($user) {

                $result = password_verify($password, $user->getPassword());


                if ($result) {

                    $_SESSION['connectedUser'] = $user;
                    header('Location: /');
                    exit;
                    
                    }else{

                        header('Location: /');
                        exit;
                    }  
                    
            }
            header('Location: /');
            exit;
        }
    }
            public function deconnection()
            {
                unset($_SESSION['connectedUser']);


                header('Location: /');
                exit;
            }


            public function create(){


                //* On récupere nos données de $_POST et on les transformes en variables

                $nickname = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING );

                $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
                $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_NUMBER_INT );


                //* On hash le password avant de le transmettre à la bdd
                $password = filter_input(INPUT_POST, 'password');


                if($nickname && $role && $status && $password){
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                    //* On instancie notre nouvel utilisateur
                    $newUser = new AppUser();
                    //* On lui attribue de nouvelles propriétés
                    $newUser->setNickname($nickname);

                    $newUser->setRole($role);
                    $newUser->setStatus($status);
                    $newUser->setPassword($passwordHash);

                    $return = $newUser->save();

                    if($return) {
//Used to redirect
                        header('Location: /');
                        exit;
                    }

                    header('Location: /');
                    exit;
                }

                header('Location: /');
                exit;
            }

}