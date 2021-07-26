<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/inscription", name="app_register")
     */
    public function register(Request $request, UserPasswordHasherInterface $UserPasswordHasherInterface, ServiceRepository $serviceRepository): Response
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

            // We check if the switch button is checked.
            // We get the value of the checkbox (true or false).
            $status = $form->get('status')->getData();
            // If the switch is checked $status === true : the user will be registered as a Angel (status = 1).
            if ($status === true) {
                // We set the value 2 (Ange) to the status.
                $user->setStatus(2);
                // TODO START : code to improve.
                // We get the value of the form fields with the input of the user.
                $phoneNumber = $form->get('phonenumber')->getData();
                $zipCode = $form->get('zipcode')->getData();
                $city = $form->get('city')->getData();
                $services = $form->get('services')->getData();
                // We check if the data exist.
                // If the data is emtpy or null we display a flash message message for the user.
                if ($phoneNumber && $zipCode && $city && $services) {
                    // Else if the data is correct.
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($user);
                    // dd($user);
                // Else if the data is emtpy or null.
                } elseif ((empty($phoneNumber) || isset($phoneNumber)) || (empty($zipCode) || isset($zipCode)) || (empty($city) || isset($city)) || (empty($services) || isset($services))) {
                    // We display a flash message for the user.
                    $this->addFlash('danger', 'Merci de compléter tous les champs.');
                    // We redirect to user to the login page & we specify the related HTTP response status code.
                    return $this->redirectToRoute('app_register', [], 301);
                } else {
                    // We stop the execution of the condition.
                    exit();
                }
                // TODO END.
                // Else if the switch is not checked $status === false, user will be registered as a marcheur (status = 2).
            } elseif ($status === false) {
                // We set the value 1 (Marcheur) to the status.
                $user->setStatus(1);
            }
          
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            // We display a flash message for the user.
            $this->addFlash('success', 'Bonjour ' .$user->getFirstName(). '. Votre compte a bien été créé.');

            // We redirect to user to the login page & we specify the related HTTP response status code.
            return $this->redirectToRoute('app_login', [], 301);
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            "services" => $serviceRepository->findAll()
            // We specify the related HTTP response status code.
        ], new Response('', 200));
    }
}
