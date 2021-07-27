<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Service\ImageUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/user", name="admin_user_")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('admin/user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     */
    public function new(Request $request, UserPasswordHasherInterface $UserPasswordHasherInterface, ImageUploader $imageUploader): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user->setPassword(
                $UserPasswordHasherInterface->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );

            $newFileName = $imageUploader->imageUpload($form, 'picture');
            $user->setpicture($newFileName);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'l\'utilisateur ' .$user->getFirstName(). ' ' .$user->getLastName(). ' a bien été créé');
            return $this->redirectToRoute('admin_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('admin/user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user, ImageUploader $imageUploader): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
       
        if ($form->isSubmitted() && $form->isValid()) {

            $newFileName = $imageUploader->imageUpload($form, 'picture');
            if ($newFileName !== null) {

                $user->setpicture($newFileName);
            }
             
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'L\'utilisateur ' .$user->getFirstName(). ' ' .$user->getLastName(). ' a bien été modifié');
            return $this->redirectToRoute('admin_user_index');
        }

        return $this->renderForm('admin/user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"POST"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        $this->addFlash('success', 'Utilisateur supprimer');
        return $this->redirectToRoute('admin_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
