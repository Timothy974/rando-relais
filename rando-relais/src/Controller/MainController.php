<?php

namespace App\Controller;

use App\Data\SearchFilter;
use App\Entity\User;
use App\Form\SearchType;
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
    public function index(UserRepository $user, ServiceRepository $service, Request $request): Response
    {
        // If a user logged in acces the home page.
        if ($this->isGranted('ROLE_USER')) {
            // If the user's status is DESACTIVATE_STATUS.
            if ($this->getUser()->getStatus() === User::DESACTIVATE_STATUS) {
                // We redirect the user to the page who allo him to reactivate is account.
                // We specify the related HTTP response status code.
                return $this->redirectToRoute('user_allow_account_reactivation', ['id' => $this->getUser()->getId() ], 301);
            }
        }

        $data = new SearchFilter();
        $form = $this->createForm(SearchType::class, $data);
        $form->handleRequest($request);
        $userData = $user->findSearch($data);
        $angels = $user->findAngelAndServices(2);

        // We display the page we want with a array of optional data.
        // We specify the related HTTP response status code.
        return $this->render('main/index.html.twig', [
                'angels' => $angels,
                'form' => $form->createView(),
                'angels' => $userData
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
