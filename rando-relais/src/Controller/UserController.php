<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/info/{id}", name="show_angel", requirements={"id" = "\d+"})
     */
    public function showAngel(int $id, UserRepository $userRepository): Response
    {

        // Get the data of the specific angel called in the route ({id)}) in database
        $angelData = $userRepository->find($id);

        // Return the angel data to the view
        return $this->render('user/show-angel.html.twig', [
            'angelData' => $angelData
        ]);
    }
}
