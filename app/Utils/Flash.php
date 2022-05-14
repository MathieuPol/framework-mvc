<?php
//! To set up optional messages
namespace App\Utils;

abstract class Flash
{
    /**
     * Récupere le contenu flash en session et le supprime
     *
     * @return array
     */
    public static function getAllFlash()
    {
        // On recupere les messages en sessions ou un tableau vide
        $messages = isset($_SESSION['message']) ? $_SESSION['message'] : [];
        // On supprime les messages
        unset($_SESSION['message']);
        return $messages;
    }

    /**
     * Ajoute un nouveau message d'erreur
     *
     * @param string $errorMessage
     * @return void
     */
    public static function setErrorFlash($errorMessage)
    {
        // Verifie la présence de message et errors
        isset($_SESSION['message']) ? true : $_SESSION['message'] = [];
        isset($_SESSION['message']['errors']) ? true : $_SESSION['message']['errors'] = [];
        // Ajout un nouvel element dans errors
        array_push($_SESSION['message']['errors'], $errorMessage);
    }


    /**
     * Ajoute un nouveau message de succés
     *
     * @param string $successMessage
     * @return void
     */
    public static function setSuccessFlash($successMessage)
    {
        // Verifie la présence de message et successes
        isset($_SESSION['message']) ? true : $_SESSION['message'] = [];
        isset($_SESSION['message']['successes']) ? true : $_SESSION['message']['successes'] = [];
        // Ajout un nouvel element dans successes
        array_push($_SESSION['message']['successes'], $successMessage);
    }

    /**
     * Ajoute un nouveau message de formulaire
     *
     * @param array $formMessage
     * @return void
     */
    public static function setFormFlash($formMessage)
    {
        // Verifie la présence de message et form
        isset($_SESSION['message']) ? true : $_SESSION['message'] = [];
        isset($_SESSION['message']['form']) ? true : $_SESSION['message']['form'] = [];
        // Ajout un nouvel element dans form
        array_push($_SESSION['message']['form'], $formMessage);
    }
}