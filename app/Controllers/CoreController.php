<?php

namespace App\Controllers;

use App\Utils\Flash;

//* abstract mean you'll never call a new CoreController
abstract class CoreController
{
//! Part used to set up acl
//!!! Don't forget to set up acl for the POST method
        /*     public function __construct()
            {
                global $match;
                $routeName = $match['name'];

                $acl =[ 
----------------------
->you must have to add the page name and role autorized Here
->If your page don't apear here, it's free to access
----------------------
                'your-page' => ['admin', 'user'],
                ];

                if (array_key_exists($routeName, $acl)) {

                    $authorizedRoles = $acl[$routeName];
                    $this->checkAuthorization($authorizedRoles);
                }


?------------------
?CSRF PART
?------------------

$CSRFTokenToCheck = [
    'waytoprotect',
    'main-home'

];

if (in_array($routeName, $CSRFTokenToCheck)) {
    $token = isset($_POST['token']) ? $_POST['token'] : '';


    $sessionToken = isset($_SESSION['token']) ? $_SESSION['token'] : '';

    if ($token !== $sessionToken || empty($token)) {
        header('location: /403');
        exit();
    } else {
        unset($_SESSION['token']);
    }
}
!to complete the process you have to add this in the top of the form you want to protect
?<input type = "hidden" name="token" value="<?= $_SESSION['token']?>">
!-----------------------------------------------

?-----------------




















            }

            public function checkAuthorization($roles = [])
            {

                if(isset($_SESSION['connectedUser'])) {

                    $user = $_SESSION['connectedUser'];

                    $userRole = $user->getRole();

                    if(in_array($userRole, $roles)) {
                        
                        return true;
                    }

                                header('Location: /');
                                exit();

                }

                Flash::setErrorFlash('Merci de vous connecter pour acceder a cette ressource');
                header('Location: /user/connection');
                exit;
            } */

    protected function show(string $viewName, $viewData = [])
    {

        global $router;

        $viewData['currentPage'] = $viewName;

        $viewData['assetsBaseUri'] = $_SERVER['BASE_URI'] . 'assets/';

        $viewData['baseUri'] = $_SERVER['BASE_URI'];

        extract($viewData);

        require_once __DIR__ . '/../views/layout/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/layout/footer.tpl.php';
    }
}