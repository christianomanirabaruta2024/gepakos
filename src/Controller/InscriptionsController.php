<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\{
    DefuntsRepository,
    MariagesRepository,
    PersonnelsRepository,
    BaptemesRepository,
    CommunionsRepository,
    ConfirmationsRepository
};

class InscriptionsController extends AbstractController
{
    #[Route('/', name: 'app_inscriptions')]
    public function index(
        DefuntsRepository $defunctRepository,
        PersonnelsRepository $personnelsRepository,
        BaptemesRepository $baptemesRepository,
        MariagesRepository $mariagesRepository,
        CommunionsRepository $communionsRepository,
        ConfirmationsRepository $confirmationsRepository
    ): Response {
        $totalDefunct = $defunctRepository->countDefunct();
        $totalPersonnel = $personnelsRepository->countPersonnel();
        $totalBaptemes = $baptemesRepository->countBapteme();
        $totalMariages = $mariagesRepository->countMariage();
        $totalCommunions = $communionsRepository->countCommunion();
        $totalConfirmations = $confirmationsRepository->countConfirmation();

        return $this->render('inscriptions/index.html.twig', [
            'controller_name' => 'InscriptionsController',
            'totalDefunct' => $totalDefunct,
            'totalPersonnel' => $totalPersonnel,
            'totalBaptemes' => $totalBaptemes,
            'totalMariages' => $totalMariages,
            'totalCommunions' => $totalCommunions,
            'totalConfirmations' => $totalConfirmations,
        ]);
    }
}
