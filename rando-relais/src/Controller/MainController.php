<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(UserRepository $angel): Response
    {
        return $this->render('main/index.html.twig', [
            'angels' => $angel->findAll()
        ]);
    }

    /**
    * @Route("/404", name="404")
    */
    public function error404(): Response
    {
        return $this->render('main/404.html.twig', [
            
        ]);
    }

    /**
    * @Route("/informations", name="main_information", methods={"GET"})
    */
    public function information(ServiceRepository $service): Response
    {
        // In order to have access to the object Entity Service we call the ServiceRepository in argument of the information() method.
        // We pass the object to the render() method with the findAll() method form the ServiceRepository so we can catch all the services.
        return $this->render("main/information.html.twig", [
            "services" => $service->findAll()
        ]);
    }
}
