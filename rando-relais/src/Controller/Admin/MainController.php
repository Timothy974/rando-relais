<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
     * @Route("/admin", name="admin_")
     */
class MainController extends AbstractController
{
    /**
     * @Route("/", name="stat")
     */
    public function index(): Response
    {
        return $this->render('admin/main/stat.html.twig');
    }
}
