<?php

namespace App\Controller;

use App\Entity\Review;
use App\Form\ReviewType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class ReviewController extends AbstractController
{
    /**
     * @Route("/review/{id}/add", name="add_review")
     */
    public function add(int $id, Request $request, UserInterface $userInterface, UserRepository $userRepository): Response
    {
        // Get the user info to be reviewed
        $reviewedUser = $userRepository->find($id);

        // Get the author id
        $authorId = $userInterface->getId();

        // Review instance
        $review = new Review();

        // Set the user to be the current user to be review
        $review->setUser($reviewedUser);

        // Create a form to add a review
        $reviewForm = $this->createForm(ReviewType::class, $review);

        // Process the form on submit
        $reviewForm->handleRequest($request);

        if ($reviewForm->isSubmitted() && $reviewForm->isValid()) {
            // Fill the Review object with the values of the form
            $review = $reviewForm->getData();

            // Change the Review object 'author' property
            $review->setAuthorId($authorId);

            // Add the review to the database
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($review);
            $entityManager->flush();

            // Redirect the reviewed user's profile
            return $this->redirectToRoute('show_angel', ['id' => $id]);
        }

        return $this->render('review/add.html.twig', [
            'reviewForm' => $reviewForm->createView(),
            'authorId' => $authorId,
            'reviewedUser' => $reviewedUser
        ]);
    }

    /**
     * @Route("/review/{id}/madelist", name="madelist_review")
     */
    public function madeList(int $id)
    {
        return $this->render('review/madelist.html.twig', [
            'id' => $id
        ]);
    }

    /**
     * @Route("/review/{id}/receivedlist", name="receivedlist_review")
     */
    public function receivedList(int $id)
    {
        return $this->render('review/receivedlist.html.twig', [
            'id' => $id
        ]);
    }
}
