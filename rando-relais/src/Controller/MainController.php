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
use Symfony\Component\Security\Core\User\UserInterface;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main", methods={"GET"})
     *
     * @return Response
     */
    public function index(UserRepository $user, ServiceRepository $service, Request $request): Response
    {
        // We set to $desactivateStatus the value of DESACTIVATE_STATUS.
        $desactivateStatus = RegistrationController::DESACTIVATE_STATUS;

        // If a user logged in acces the home page. 
        if ($this->isGranted('ROLE_USER')) {
            // If the user's status is DESACTIVATE_STATUS.
            if ($this->getUser()->getStatus() === $desactivateStatus) {
                // We redirect the user to the page who allo him to reactivate is account.
                // We specify the related HTTP response status code.
                return $this->redirectToRoute('main_allow_account_reactivation', ['id' => $this->getUser()->getId() ], 301);
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

    /**
     * @Route("/{id}/reactiver-mon-compte", name="main_allow_account_reactivation", methods={"GET"})
     *
     * @return Response
     */
    public function allowAccountReactivation(): Response
    {
        // We display the page we want with a array of optional data.
        // We specify the related HTTP response status code.
        return $this->render(
            'main/reactivate-account.html.twig',
            [
                'userId'        => $this->getUser()->getId(),
                'userFirstName' => $this->getUser()->getFirstName(),
                'userEmail'     => $this->getUser()->getEmail()
            ],
            new Response('', 200)
        );
    }

    /**
     * @Route("/{id}/reactivation", name="main_reactivate_account", methods={"GET|POST"})
     *
     * @return Response
     */
    public function reactivateUserAccount(Request $request, User $user): Response
    {
        // We catch the Token that the user submit after his click on the delete button.
        $submitedToken = $request->request->get('token') ??  $request->query->get('token');

        // If the submitedToken is valid.
        if ($this->isCsrfTokenValid('reactivate-user-account' . $user->getId(), $submitedToken)) {
            // We set to $desactivateStatus the value of DESACTIVATE_STATUS.
            $desactivateStatus = RegistrationController::DESACTIVATE_STATUS;
            // We set to $hikerStatus the value of HIKER_STATUS.
            $hikerStatus = RegistrationController::HIKER_STATUS;
         
            // If the status of the current user is DESACTIVATE_STATUS.
            if ($user->getStatus() === $desactivateStatus) {
                // We set the value of his status to HIKER_STATUS.
                $user->setStatus($hikerStatus);
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
