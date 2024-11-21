<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BaptemeController extends AbstractController
{
    #[Route('/bapteme', name: 'app_bapteme')]
    public function index(): Response
    {
        return $this->render('bapteme/index.html.twig', [
            'controller_name' => 'BaptemeController',
        ]);
    }

    #[Route('/bapteme/add/new', name: 'app_new_add_bapteme')]
    public function addNewBapteme(): Response
    {
        return $this->render('bapteme/addBaptemes.html.twig', [
            'controller_name' => 'add baptemes',
        ]);
    }
}
