<?php

namespace App\Controller\Api;

use App\Repository\ServiceRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/ange")
 */
class AngelController extends AbstractController
{
    /**
     * @Route("", name="ange_list", methods={"GET"})
     */
    public function list(UserRepository $userRepository): Response
    {
        // We get all the users with the status 2 => angel and the services they offer.
        $angels = $userRepository->findAngelAndServices(2);

        // We display the page with a array of optional data.
        // We specify the related HTTP response status code.
        return $this->json($angels, 200, [], [
            'groups' => 'users'
        ]);
    }

    /**
     * @Route("/information/{id}", name="angel_details", methods={"GET"})
     */
    public function details(int $id, UserRepository $userRepository): Response
    {
        // We get the user by is id.
        $user = $userRepository->find($id);

        // If the user's status is 2 (Angel). We can display the data.
        if ($user->getStatus() === 2) {
            // We display the data with a array of optional data.
            // We specify the related HTTP response status code.
            return $this->json($user, 200, [], [
                'groups' => 'users'
            ]);
        } // Else the user have a status 1 (Marcheur).
        else {
            // We can't display the data because the status 1 (Marcheur) don't have a information page.
            // We display a flash message for the user.
            // We specify the related HTTP response status code.
            return $this->json([
                'message' => 'Un utilisateur marcheur ne possède pas de page information.'
            ], 404);
        }
    }

    /**
    * @Route("/recherche", name="angel_search", methods={"GET"})
    */
    public function search(Request $request, UserRepository $userRepository, ServiceRepository $serviceRepository): Response
    {
        // TODO

        // We display the data with a array of optional data.
        // We specify the related HTTP response status code.
        return $this->json([], 200);
    }
}
