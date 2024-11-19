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
use App\Enum\Genre;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;


class ParoissienController extends AbstractController
{
    #[Route('/paroissien', name: 'app_paroissien_index',methods: ['GET', 'POST'])]
    public function index(): Response
    {
        return $this->render('paroissien/index.html.twig', [
            'controller_name' => 'ParoissienController',
        ]);
    }

    #[Route('/paroissien/addnew/paroissien', name: 'app_paroissien_add_new', methods: ['GET', 'POST'])]
    // Ajouter un nouveau paroissien
    public function addNew(Request $request,
     LoggerInterface $logger,
     EntityManagerInterface $entityManager,
     FlashBagInterface $flashBag): Response
    {
        if ($request->isMethod('POST')) {
            // Récupérer les données envoyées via POST
            $data = $request->request->all();
            $logger->info('Données soumises : ', $data);
    
            // Vérification des données requises
            if (empty($data['roadnumber']) || empty($data['roadname']) || empty($data['city']) || empty($data['postale']) || empty($data['pays'])) {
                return $this->json(['error' => 'Les informations d\'adresse sont manquantes.'], 400);
            }
    
            // Vérifier que le genre est valide
            if (!isset($data['gerne']) || !in_array($data['gerne'], ['Masculin', 'Feminin'])) {
                return $this->json(['error' => 'Le genre est obligatoire et doit être Masculin ou Feminin.'], 400);
            }
    
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
    
            // Validation de l'adresse et affectation des données au paroissien
            if (!empty($adresse->getIdAdresse())) {
                $paroissien->setAdresse($adresse);  // L'objet adresse est passé ici
                $paroissien->setNom($data['firstname']);
                $paroissien->setPrenom($data['lastname']);
                $paroissien->setDateNaissance(new \DateTime($data['birthdate']));
                $paroissien->setTelephone($data['numberphone']);
                $paroissien->setEmail($data['email']);
                $paroissien->setLieuNaissance($data['birthlocation']);
    
                // Exemple de gestion de l'enum pour le genre
                if ($data['gerne'] === "Masculin") {
                    $paroissien->setGenre(Genre::HOMME); // À ajuster en fonction de l'input 'gerne'
                }
                if ($data['gerne'] === "Feminin") {
                    $paroissien->setGenre(Genre::FEMME); // À ajuster en fonction de l'input 'gerne'
                }
    
                // Persist et flush pour enregistrer le paroissien
                $entityManager->persist($paroissien);
                $entityManager->flush();
    
                $flashBag->add('success', 'Paroissien ajouté avec succès !');

                // Rediriger vers la page d'index avec le message flash
                return $this->redirectToRoute('app_paroissien_index');
            }
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

