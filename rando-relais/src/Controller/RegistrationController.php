<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\ServiceRepository;
use App\Service\AddressApi;
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
    public function register(Request $request, UserPasswordHasherInterface $UserPasswordHasherInterface, AddressApi $addressApi): Response
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
            // If the switch is checked $status === true : the user will be registered as a Angel (status 1).
            if ($status === true) {
                // We set the value 2 (Ange) to the status.
                $user->setStatus(2);
            }
            // Else if the switch is not checked $status === false, user will be registered as a marcheur (status 2).
            elseif ($status === false) {
                // We set the value 1 (Marcheur) to the status.
                $user->setStatus(1);
            }
          
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);

            // if a someone create an angel account we use addressApi service to get the gps coordinates of his city
            if ($user->getStatus() === 2) {
                // Get city and zipCode of the new subscriber to use addressApi service
                $city = $user->getCity();
                $zipCode = $user->getZipCode();
                // Get an array of data with latitude and longitude of the subscriber's city
                $dataArray = $addressApi->getCoordinatesWithAddress($city, $zipCode);
                // Recover the latitude and longitude of the city
                $lat = $dataArray["features"][0]["geometry"]["coordinates"][1];
                $lon = $dataArray["features"][0]["geometry"]["coordinates"][0];
                // Set the latitude and longitude of the subscriber before flush in database
                $user->setLatitude($lat);
                $user->setLongitude($lon);
            }

            $entityManager->flush();
            // do anything else you need here, like send an email

            // We display a flash message for the user.
            $this->addFlash('success', 'Bonjour ' .$user->getFirstName(). '. Votre compte a bien été créé.');

            // We redirect to user to the login page with a array of optional data & we specify the related HTTP response status code.
            return $this->redirectToRoute('app_login', [], 301);
        }

        // We display the page we want with a array of optional data.
        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            // We specify the related HTTP response status code.
        ], new Response('', 200));
    }
}
