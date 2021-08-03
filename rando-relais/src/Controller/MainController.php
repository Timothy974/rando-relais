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
    public function index(UserRepository $user, ServiceRepository $service): Response
    {
        $angels = $user->findAngelAndServices(2);
        return $this->render('main/index.html.twig', [
            'angels' => $angels
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

    /**
     * @Route("/team", name="team", methods={"GET"})
     *
     * @return Response
     */
    public function team(): Response
    {
        return $this->render('main/team.html.twig', []);
    }

    /**
    * @Route("/conditions-generales-utilisation", name="main_terms_of_services", methods={"GET"})
    *
    * @return Response
    */
    public function generalConditionsOfUse(): Response
    {
        // We display the page we want with a array of optional data.
        // We specify the related HTTP response status code.
        return $this->render(
            'main/terms-of-service.html.twig',
            [],
            new Response('', 200)
        );
    }

    /**
    * @Route("/mentions-legales", name="main_legal_notices", methods={"GET"})
    *
    * @return Response
    */
    public function legalNotices(): Response
    {
        // We display the page we want with a array of optional data.
        // We specify the related HTTP response status code.
        return $this->render(
            'main/legal-notices.html.twig',
            [],
            new Response('', 200)
        );
    }

    /**
     * This road allow access to a video which introduce the back-office
     * 
     * @Route("/back-office", name="back-office", methods={"GET"})
     * 
     */
    public function visitTheBackoffice()
    {

        return $this->render('main/back-office.html.twig');
    }
}
