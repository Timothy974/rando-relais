<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\ServiceRepository;
use App\Service\ImageUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    // The status Desactivate have the value 0.
    const DESACTIVATE_STATUS = 0;
    // The status Marcheur have the value 1.
    const HIKER_STATUS = 1;
    // The status Ange have the value 2.
    const ANGEL_STATUS = 2;

    /**
     * @Route("/inscription", name="app_register")
     */
    public function register(Request $request, UserPasswordHasherInterface $UserPasswordHasherInterface, ImageUploader $imageIploader): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $UserPasswordHasherInterface->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            
            // We set to $hikerStatus the value of HIKER_STATUS.
            $hikerStatus = RegistrationController::HIKER_STATUS;
            // We set to $angelStatus the value of ANGEL_STATUS.
            $angelStatus = RegistrationController::ANGEL_STATUS;

            // We check if the switch button is checked.
            // We get the value of the checkbox (true or false).
            $status = $form->get('status')->getData();
            // If the switch is checked $status === true : the user will be registered with a ANGEL_STATUS.
            if ($status === true) {
                // We set the value 2 to the status.
                $user->setStatus($angelStatus);
            }
            // Else if the switch is not checked $status === false : the user will be registered with a HIKER_STATUS.
            elseif ($status === false) {
                // We set the value 1 to the status.
                $user->setStatus($hikerStatus);
            } // Else. We should not drop here but just in case.
            else {
                // We stop the execution of the condition.
                exit();
            }

            // We get the picture uploaded by the user.
            $newFileName = $imageIploader->imageUpload($form, 'picture');
            // If $newFileName === true.
            if ($newFileName) {
                // We set the picture property with the $newFileName.
                $user->setPicture($newFileName);
            }
          
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            // We display a flash message for the user.
            $this->addFlash('success', 'Bonjour ' .$user->getFirstName(). '. votre compte a bien été créé.');

            // We redirect to user to the login page with a array of optional data & we specify the related HTTP response status code.
            return $this->redirectToRoute('app_login', [], 301);
        }

        // We display the page we want with a array of optional data.
        // We specify the related HTTP response status code.
        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ], new Response('', 200));
    }
}
