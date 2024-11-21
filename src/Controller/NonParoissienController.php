<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\NonParoissiensRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\NonParoissiens;
use App\Entity\Adresses;
use App\Enum\Genre;
class NonParoissienController extends AbstractController
{
    #[Route('/non/paroissien', name: 'app_non_paroissien',methods:['GET'])]
    public function index(Request $request,NonParoissiensRepository $nonParoissiensRepository): Response
    {
        $page = max((int) $request->query->get('page', 1), 1); // Récupère la page actuelle (par défaut 1)
        $limit = 5; // Nombre d'éléments par page
        // Récupération de tous les paroissiens
        $pagination = $nonParoissiensRepository->findAllNonParoissiensWithAdresses($page,$limit);

        return $this->render('non_paroissien/index.html.twig', [
            'controller_name' => 'NonParoissienController',
            'pagination' => $pagination,
        ]);
    }

    #[Route('/non/paroissien/addnew', name: 'app_non_paroissien_add_new',methods:['POST','GET'])]
    public function addNewNonParoissien(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($request->isMethod('POST')) {
            // Récupérer les données envoyées via POST
            $data = $request->request->all();

            // Validation des données
            if (empty($data['roadnumber']) || empty($data['roadname']) || empty($data['city']) || empty($data['postale']) || empty($data['pays'])) {
                $this->addFlash('error', 'Les informations d\'adresse sont manquantes.');
                return $this->redirectToRoute('app_non_paroissien_add_new');
            }

            if (!isset($data['gerne']) || !in_array($data['gerne'], ['Masculin', 'Feminin'])) {
                $this->addFlash('error', 'Le genre est obligatoire et doit être Masculin ou Feminin.');
                return $this->redirectToRoute('app_non_paroissien_add_new');
            }

            // Création des entités
            $nonparoissien = new NonParoissiens();
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
            $nonparoissien->setAdresse($adresse);
            $nonparoissien->setNom($data['firstname']);
            $nonparoissien->setPrenom($data['lastname']);
            $nonparoissien->setDateNaissance(new \DateTime($data['birthdate']));
            $nonparoissien->setTelephone($data['numberphone']);
            $nonparoissien->setEmail($data['email']);
            $nonparoissien->setLieuNaissance($data['birthlocation']);
            $nonparoissien->setConfession($data['comfession']);

            if ($data['gerne'] === "Masculin") {
                $nonparoissien->setGenre(Genre::HOMME);
            } elseif ($data['gerne'] === "Feminin") {
                $nonparoissien->setGenre(Genre::FEMME);
            }

            // Persist et flush pour enregistrer le paroissien
            $entityManager->persist($nonparoissien);
            $entityManager->flush();

            // Ajouter un message de succès
            $this->addFlash('success', 'Non paroissien ajouté avec succès !');

            // Rediriger vers la page d'index
            return $this->redirectToRoute('app_non_paroissien_add_new');
        }


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
