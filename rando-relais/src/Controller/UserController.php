<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * Method to display an angel information page
     * 
     * @Route("/user", name="user")
     */
    public function angelInformation(): Response
    {
        return $this->render('user/info-ange.html.twig');
    }

      /**
     * Method to display an angel information page
     * 
     * @Route("/connexion", name="connection")
     */
    public function userConnection(): Response
    {
        return $this->render('user/connection.html.twig');
    }
}
