<?php

namespace App\Controller;

use App\Repository\ReviewRepository;
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

        // Get the reviews from a user
        $userReviews = $angelData->getReviews();

        // Get the total number of reviews for this user
        $totalReviewsCount = count($userReviews);

        // Set the total rating to 0
        $totalRating = 0;
        $averageRating = 0;
        $authorNameArray[] = '';

        // Review: Calculate the average rating of the user and get the firstname of the author 
        foreach ($userReviews as $currentReview) {
            // Get the rating of the current review
            $currentRating = $currentReview->getRating();
            // Calculate the total rating of the current review
            $totalRating = $totalRating + $currentRating;

            // Get the author's id of the current review
            $currentAuthorId = $currentReview->getAuthorId();
            // Get the name of the current author's id
            $currentAuthorName = $userRepository->find($currentAuthorId)->getFirstName();
            // Fill an array with all the authors of the reviews
            $authorNameArray[] = $currentAuthorName;
        }

        // Calculate the average rating of all reviews 
        if ($totalReviewsCount !== 0) {
            $averageRating = $totalRating / $totalReviewsCount;
        }

        // Return the angel data to the view
        return $this->render('user/show-angel.html.twig', [
            'angelData' => $angelData,
            'userReviews' => $userReviews,
            'averageRating' => $averageRating,
            'totalReviewsCount' => $totalReviewsCount,
            'authorNameArray' => $authorNameArray
        ]);
    }

    /**
     * @Route("/user/{id}/profile", name="user_profile")
     */
    public function profile(int $id): Response
    {
        return $this->render('user/profile.html.twig', [
           'id' => $id
        ]);
    }
}
