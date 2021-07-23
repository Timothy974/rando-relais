<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main", methods={"GET"})
     *
     * @return Response
     */
    public function index(UserRepository $angel, ServiceRepository $service): Response
    {
        return $this->render('main/index.html.twig', [
            'angels' => $angel->findAll(),
            'services' => $service->findAll()
        ]);
    }

    /**
     * @Route("/404", name="404", methods={"GET"})
     *
     * @return Response
     */
    public function error404(): Response
    {
        return $this->render('main/404.html.twig', []);
    }

    /**
     * @Route("/filtrer", name="search", methods={"GET"})
     *
     * @return Response
     */
    public function search(Request $request, UserRepository $angel, ServiceRepository $service): Response
    {
        // Get the information from input search form
        $searchValue = $request->get('query');

        // use the custom query with the search value
        $angelFilter = $angel->findUserByCity($searchValue);

        return $this->render('main/index.html.twig', [
            'angels' => $angelFilter,
            'services' => $service->findAll()
        ]);
    }

    /**
     * @Route("/download", name="main_download", methods={"GET"})
     *
     * @return Response
     */
    public function download(): Response
    {
        // The path to the files is relative to the public folder.
        return $this->file('assets/files/rando-relais-calendar.pdf', 'rando-relais-calendrier.pdf');
    }
}
