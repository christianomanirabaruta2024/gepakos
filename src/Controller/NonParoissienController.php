<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NonParoissienController extends AbstractController
{
    #[Route('/non/paroissien', name: 'app_non_paroissien')]
    public function index(): Response
    {
        return $this->render('non_paroissien/index.html.twig', [
            'controller_name' => 'NonParoissienController',
        ]);
    }

    #[Route('/non/paroissien/addnew', name: 'app_non_paroissien_add_new')]
    public function addNewNonParoissien(): Response
    {
        return $this->render('non_paroissien/addnewnonparoissien.html.twig', [
            'controller_name' => 'ParoissienController',
        ]);
    }
    #[Route('/non/paroissien/addold', name: 'app_non_paroissien_add_old')]
    public function addOldNonParoissien(): Response
    {
        return $this->render('non_paroissien/addoldnonparoissien.html.twig', [
            'controller_name' => 'ParoissienController',
        ]);
    }
}
