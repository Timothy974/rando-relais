<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserProfileType;
use App\Repository\ReviewRepository;
use App\Repository\UserRepository;
use App\Service\ImageUploader;
use App\Service\WeatherApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/info/{id}", name="show_angel", requirements={"id" = "\d+"})
     */
    public function showAngel(int $id, UserRepository $userRepository, WeatherApi $weatherApi): Response
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

            // If there is a authorId in this review
            if ($currentAuthorId !== 0) {
                // Get the Author's object of a review
                $currentAuthor = $userRepository->find($currentAuthorId);
                // Get the name of the current author's id
                if ($currentAuthor !== null) {
                    // Get the firstName of the Author
                    $currentAuthorName = $currentAuthor->getFirstName();
                    // Fill an array with all the authors of the reviews
                    $authorNameArray[] = $currentAuthorName;
                }
            }
        }

        // Calculate the average rating of all reviews
        if ($totalReviewsCount !== 0) {
            $averageRating = $totalRating / $totalReviewsCount;
        }

        // Get user zipCode to use it for weatherApi service
        $zipCode = $angelData->getZipCode();
        $weather = $weatherApi->getWeather($zipCode);

        // Return the angel data to the view
        return $this->render('user/show-angel.html.twig', [
            'angelData' => $angelData,
            'userReviews' => $userReviews,
            'averageRating' => $averageRating,
            'totalReviewsCount' => $totalReviewsCount,
            'authorNameArray' => $authorNameArray,
            'weather' => $weather
        ]);
    }

    /**
     * @Route("/user/{id}/profil", name="user_profile", methods={"GET|POST"})
     */
    public function profile(Request $request, User $user, ImageUploader $imageIploader): Response
    {
        // We create the form.
        $form = $this->createForm(UserProfileType::class, $user);
        $form->handleRequest($request);

        // If the form is submitted & if the form is valid.
        if ($form->isSubmitted() && $form->isValid()) {
            // If the form field picture has data.
            if ($form->has('picture')) {
                // We get the picture uploaded by the user.
                $newFileName = $imageIploader->imageUpload($form, 'picture');
                // If $newFileName === true.
                if ($newFileName) {
                    // We set the picture property with the $newFileName.
                    $user->setPicture($newFileName);
                }
            }
            
            // We call the getManager() method.
            $entityManager = $this->getDoctrine()->getManager();
            // We backup the data in the database.
            $entityManager->flush();

            // We display a flash message for the user.
            $this->addFlash('success', 'Bonjour ' . $user->getFirstName(). ', votre profil a bien été modifié.');

            // We redirect the user to the profile page with a array of optional data.
            // We specify the related HTTP response status code.
            return $this->redirectToRoute('user_profile', ['id' => $user->getId() ], 301);
        }

        // We display the page we want with a array of optional data.
        // We specify the related HTTP response status code.
        return $this->render('user/profile.html.twig', [
            'UserProfileForm' => $form->createView(),
            'status' => $user->getStatusName(),
        ], new Response('', 200));
    }

    /**
     * @Route("/{id}/delete", name="user_delete", methods={"GET"})
     */
    public function delete(Request $request, User $user): Response
    {
        // We catch the Token that the user submit after his click on the delete button.
        $submitedToken = $request->request->get('token') ??  $request->query->get('token');

        // If the submitedToken is valid.
        if ($this->isCsrfTokenValid('delete-user' . $user->getId(), $submitedToken)) {
            // If the status of the current user different than User::DESACTIVATE_STATUS.
            if ($user->getStatus() != User::DESACTIVATE_STATUS) {
                // We set the status with the value of User::DESACTIVATE_STATUS.
                $user->setStatus(User::DESACTIVATE_STATUS);
                // We call the getManager() method.
                // We backup the data in the database.
                $this->getDoctrine()->getManager()->flush();
            }

            // TODO START : flash message not working.
            // We display a flash message for the user.
            $this->addFlash('success', 'Bonjour ' .$user->getFirstName(). ', votre compte est désactivé et sera prochainement supprimé.');
            // TODO END.

            // We redirect the user to the logout page with a array of optional data.
            // We specify the related HTTP response status code.
            return $this->redirectToRoute('app_logout', [], 301);
        } // Else, somebody try to hack us.
        else {
            // We redirect the user to the page 403.
            // We specify the related HTTP response status code.
            return new Response('Action interdite', 403);
        }

        // ! START DON'T TOUCH.  Code for delete in database.
        // // We catch the csrfToken that the user submit after his click on the delete button.
        // $submitedToken = $request->request->get('token') ??  $request->query->get('token');


        // // If the submitedToken is valid.
        // if ($this->isCsrfTokenValid('delete-user' .$user->getId(), $submitedToken)) {
        //     // We call the getManager() method.
        //     $entityManager = $this->getDoctrine()->getManager();
        //     // We remove the user.
        //     $entityManager->remove($user);
        //     // We backup the data in the database.
        //     $entityManager->flush();

        //     // TODO START : flash message not working.
        //     // We display a flash message for the user.
        //     $this->addFlash('success', 'Le compte de ' . $user->getFirstName() . ' ' . $user->getLastName() . ' a bien été supprimé.');
        //     // TODO END.

        //     // We redirect to user to the logout page page so he his logout & we specify the related HTTP response status code.
        //     return $this->redirectToRoute('app_logout', [], 301);
        // } // Else, the submitedToken is not valid.
        // else {
        //     // We redirect the user to the page 403.
        //     // We specify the related HTTP response status code.
        //     return new Response('Action interdite', 403);
        // }
        // ! END.
    }

    /**
     * @Route("/{id}/reactiver-mon-compte", name="user_allow_account_reactivation", methods={"GET"})
     *
     * @return Response
     */
    public function allowAccountReactivation(): Response
    {
        // We display the page we want with a array of optional data.
        // We specify the related HTTP response status code.
        return $this->render(
            'user/reactivate-account.html.twig',
            [
                'userId'        => $this->getUser()->getId(),
                'userFirstName' => $this->getUser()->getFirstName(),
                'userEmail'     => $this->getUser()->getEmail()
            ],
            new Response('', 200)
        );
    }

    /**
     * @Route("/{id}/reactivation", name="user_reactivate_account", methods={"GET|POST"})
     *
     * @return Response
     */
    public function reactivateUserAccount(Request $request, User $user): Response
    {
        // We catch the Token that the user submit after his click on the delete button.
        $submitedToken = $request->request->get('token') ??  $request->query->get('token');

        // If the submitedToken is valid.
        if ($this->isCsrfTokenValid('reactivate-user-account' . $user->getId(), $submitedToken)) {
            // If the status of the current user is User::DESACTIVATE_STATUS.
            if ($user->getStatus() === User::DESACTIVATE_STATUS) {
                // We set the status with the value of User::HIKER_STATUS.
                $user->setStatus(User::HIKER_STATUS);
                // We call the getManager() method.
                // We backup the data in the database.
                $this->getDoctrine()->getManager()->flush();
            }

            // We display a flash message for the user.
            $this->addFlash('success', 'Bonjour ' .$user->getFirstName(). ', votre compte a bien été réactivé.');
           
            // We redirect the user to the profile page with a array of optional data.
            // We specify the related HTTP response status code.
            return $this->redirectToRoute('user_profile', ['id' => $user->getId() ], 301);
        }  // Else, somebody try to hack us.
        else {
            // We redirect the user to the page 403.
            // We specify the related HTTP response status code.
            return new Response('Action interdite', 403);
        }
    }
}
