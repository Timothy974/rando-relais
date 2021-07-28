<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
   * @Route("/api/v1/user")
   */
class UserController extends AbstractController
{
    /**
     * @Route("", name="user_list", methods={"GET"})
     */
    public function list(UserRepository $userRepository): Response
    {
        // We get all the users.
        $users = $userRepository->findAll();

        // We display the page we want with a array who optional data.
        // We specify the related HTTP response status code.
        return $this->json($users, 200, [], [
            'groups' => 'users'
        ]);
    }

    /**
     * @Route("/{id}", name="user_details", methods={"GET"})
     */
    public function details(User $user): Response
    {
        // We get all the user by is id.
        // We display the page we want with a array who optional data.
        // We specify the related HTTP response status code.
        return $this->json($user, 200, [], [
            'groups' => 'users'
        ]);
    }

    // /**
    //  * @Route("/{id}", name="user_create", methods={"GET"})
    //  */
    // public function create(Request $request, SerializerInterface $serializerInterface, ValidatorInterface $validatorInterface): Response
    // {
    //     // We get the data in JSON. 
    //     $jsonData = $request->getContent();

    //     // We use the deserialize() method to convert the JSON in objet => Deserialisation. 
    //     $user = $serializer->deserialize($JsonData, User::class, 'json');

    //     // We check if the Asserts of the User Entity are respected

    //     // We get all the user by is id.
    //     // We display the page we want with a array who optional data.
    //     // We specify the related HTTP response status code.
    //     return $this->json(, 200, []);
    // }
}
