<?php

namespace App\Controller\Api;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/api/v1/")
 */
class MainController extends AbstractController
{
    /**
     * @Route("", name="main_list_angels_and_services", methods={"GET"})
     */
    public function listAngelsAndServices(UserRepository $userRepository): Response
    {
        // We get all the users with the status 2 => angel and the services they offer.
        $angels = $userRepository->findAngelAndServices(2);

        // We display the page we want with a array who optional data.
        // We specify the related HTTP response status code.
        return $this->json($angels, 200, [], [
            'groups' => 'users'
        ]);
    }
}
