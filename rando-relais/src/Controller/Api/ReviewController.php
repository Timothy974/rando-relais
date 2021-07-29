<?php

namespace App\Controller\Api;

use App\Entity\Review;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/api/v1/review")
 */
class ReviewController extends AbstractController
{
    // Proprietes availables in the object.
    private $entityManager;

    // Proprietes availables in every method of the object.
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/emis", name="review_made_list")
     */
    public function madeList(UserInterface $userInterface): Response
    {
        // TODO

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/Api/ReviewController.php',
        ]);
    }

    /**
     * @Route("/recu", name="review_received_list")
     */
    public function receivedList(UserInterface $userInterface): Response
    {
        // TODO

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/Api/ReviewController.php',
        ]);
    }

    /**
     * @Route("", name="review_create", methods={"POST"})
     */
    public function create(Request $request, SerializerInterface $serializerInterface, ValidatorInterface $validatorInterface): Response
    {
        // We get the data in JSON.
        $jsonData = $request->getContent();

        // We use the deserialize() method to convert the JSON in objet => Deserialisation.
        $review = $serializerInterface->deserialize($jsonData, Review::class, 'json');

        // We check if the Asserts of the Review Entity are respected.
        $errors = $validatorInterface->validate($review);

        // If the number of error is uppder than 0.
        if (count($errors) > 0) {
            // We have at least one error.
            // We display the eventual errors for the user.
            // We specify the related HTTP response status code.
            return $this->json([
                'errors' => (string) $errors
            ], 500);
        } // Else we don't count any error.
        else {
            // We call the getManager() method.
            $entityManager = $this->getDoctrine()->getManager();
            // We persist the data.
            $entityManager->persist($review);
            // We backup the data in the database.
            $entityManager->flush();

            // We display a flash message for the user.
            // We specify the related HTTP response status code.
            // TODO : add content.
            return $this->json([
                'message' => '...'
            ], 201);
        }
    }


    /**
     * @Route("/{id}", name="review_update", methods={"PUT|PATCH"})
     */
    public function update(Review $review, Request $request, SerializerInterface $serializerInterface, ValidatorInterface $validatorInterface): Response
    {
        // We get the data in JSON.
        $jsonData = $request->getContent();

        // We use the deserialize() method to convert the JSON in objet => Deserialisation.
        $review = $serializerInterface->deserialize($jsonData, User::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $review]);

        // We check if the Asserts of the Review Entity are respected.
        $errors = $validatorInterface->validate($review);

        // If the number of error is uppder than 0.
        if (count($errors) > 0) {
            // We have at least one error.
            // We display the eventual errors for the user.
            // We specify the related HTTP response status code.
            return $this->json([
                'errors' => (string) $errors
            ], 400);
        } // Else we don't count any error.
        else {
            // We call the getManager() method.
            // We backup the data in the database.
            $this->getDoctrine()->getManager()->flush();

            // We display a flash message for the user.
            // We specify the related HTTP response status code.
            // TODO : modify content.
            return $this->json([
                'message' => '...'
            ], 201);
        }
    }

    /**
     * @Route("/{id}", name="review_delete", methods={"DELETE"})
     */
    public function delete(Review $review): Response
    {
        // We delete the review.
        $this->entityManager->remove($review);
        // We backup in database the information specifying that it be deleted.
        $this->entityManager->flush();

        // We display a flash message for the user.
        // We specify the related HTTP response status code.
        // TODO : modify content.
        return $this->json([
            'message' => '...'
        ], 200);
    }
}
