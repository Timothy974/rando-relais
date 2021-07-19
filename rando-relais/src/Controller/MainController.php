<?php

namespace App\Controller;


use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(UserRepository $angel): Response
    {
        return $this->render('main/index.html.twig', [
            'angels' => $angel->findAll()
        ]);
    }

     /**
     * @Route("/404", name="404")
     */
    public function error404(): Response
    {
        return $this->render('main/404.html.twig', [
            
        ]);
    }

    /**
     * @Route("/filtrer", name="search")
     *
     * @return void
     */
    public function search(Request $request, UserRepository $angel)
    {
        // Get the information from input search form
        $searchValue = $request->get('query');

        // use the custom query with the search value
        $angelFilter = $angel->findUserByCity($searchValue);

        return $this->render('main/index.html.twig', [
            'angels' => $angelFilter,
        ]);
    }
}
