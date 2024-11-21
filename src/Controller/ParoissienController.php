<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;
use App\Entity\Paroissiens;
use App\Entity\Adresses;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ParoissiensRepository;
use App\Enum\Genre;

class ParoissienController extends AbstractController
{
    #[Route('/paroissien', name: 'app_paroissien_index', methods: ['GET'])]
    public function index(ParoissiensRepository $paroissiensRepository,LoggerInterface $logger,Request $request): Response
    {
        $page = max((int) $request->query->get('page', 1), 1); // Récupère la page actuelle (par défaut 1)
        $limit = 6; // Nombre d'éléments par page
        // Récupération de tous les paroissiens
        $pagination = $paroissiensRepository->findAllParoissiensWithAdresses($page,$limit);
        $logger->info('Les données récupérées des paroissiens : ' . json_encode($pagination));

        return $this->render('paroissien/index.html.twig', [
           'pagination' => $pagination,
        ]);
    }

    #[Route('/paroissien/addnew/paroissien', name: 'app_paroissien_add_new', methods: ['GET', 'POST'])]
    public function addNew(Request $request, LoggerInterface $logger, EntityManagerInterface $entityManager): Response
    {
        if ($request->isMethod('POST')) {
            // Récupérer les données envoyées via POST
            $data = $request->request->all();
            $logger->info('Données soumises : ', $data);

            // Validation des données
            if (empty($data['roadnumber']) || empty($data['roadname']) || empty($data['city']) || empty($data['postale']) || empty($data['pays'])) {
                $this->addFlash('error', 'Les informations d\'adresse sont manquantes.');
                return $this->redirectToRoute('app_paroissien_add_new');
            }

            if (!isset($data['gerne']) || !in_array($data['gerne'], ['Masculin', 'Feminin'])) {
                $this->addFlash('error', 'Le genre est obligatoire et doit être Masculin ou Feminin.');
                return $this->redirectToRoute('app_paroissien_add_new');
            }

            // Création des entités
            $paroissien = new Paroissiens();
            $adresse = new Adresses();

            $adresse->setNumeroRue($data['roadnumber']);
            $adresse->setNomRue($data['roadname']);
            $adresse->setVille($data['city']);
            $adresse->setCodePostal($data['postale']);
            $adresse->setPays($data['pays']);

            // Persist et flush pour enregistrer l'adresse
            $entityManager->persist($adresse);
            $entityManager->flush();

            // Affectation des données au paroissien
            $paroissien->setAdresse($adresse);
            $paroissien->setNom($data['firstname']);
            $paroissien->setPrenom($data['lastname']);
            $paroissien->setDateNaissance(new \DateTime($data['birthdate']));
            $paroissien->setTelephone($data['numberphone']);
            $paroissien->setEmail($data['email']);
            $paroissien->setLieuNaissance($data['birthlocation']);

            if ($data['gerne'] === "Masculin") {
                $paroissien->setGenre(Genre::HOMME);
            } elseif ($data['gerne'] === "Feminin") {
                $paroissien->setGenre(Genre::FEMME);
            }

            // Persist et flush pour enregistrer le paroissien
            $entityManager->persist($paroissien);
            $entityManager->flush();

            // Ajouter un message de succès
            $this->addFlash('success', 'Paroissien ajouté avec succès !');

            // Rediriger vers la page d'index
            return $this->redirectToRoute('app_paroissien_add_new');
        }

        // Logique pour GET : afficher le formulaire
        return $this->render('paroissien/addnew.html.twig', [
            'controller_name' => 'ParoissienController',
        ]);
    }


    


    #[Route('/paroissien/addold/paroissien', name: 'app_paroissien_add_old')]
    // ajouter un encien paroissien
    public function addOld(): Response
    {
        return $this->render('paroissien/addold.html.twig', [
            'controller_name' => 'ParoissienController',
        ]);
    }

    
}

