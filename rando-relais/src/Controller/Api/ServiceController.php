<?php

namespace App\Controller\Api;

use App\Repository\ServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/service")
 */
class ServiceController extends AbstractController
{
    // Proprietes availables in the object.
    private $entityManager;

    // Proprietes availables in every method of the object.
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("", name="service_list", methods={"GET"})
     */
    public function list(ServiceRepository $serviceRepository): Response
    {
        // We get all the users.
        $service = $serviceRepository->findAll();

        // We display the page with a array of optional data.
        // We specify the related HTTP response status code.
        return $this->json($service, 200, [], [
            'groups' => 'services'
        ]);
    }
}
