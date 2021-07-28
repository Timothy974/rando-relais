<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @Route("/api/v1/review")
 */
class ReviewController extends AbstractController
{
    /**
     * @Route("/emis", name="review_made_list")
     */
    public function madeList(UserInterface $userInterface): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/Api/ReviewController.php',
        ]);
    }

    /**
     * @Route("/recu", name="review_received_list")
     */
    public function madeLreceivedListist(UserInterface $userInterface): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/Api/ReviewController.php',
        ]);
    }
}
