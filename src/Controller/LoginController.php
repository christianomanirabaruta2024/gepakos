<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login', methods: ['GET', 'POST'])]
    public function index(Request $request): Response
    {
        // Si la requête est en GET, on affiche le formulaire
        if ($request->isMethod('GET')) {
            return $this->render('login/index.html.twig', [
                'controller_name' => 'LoginController',
            ]);
        }

        // Si la requête est en POST, on traite les données du formulaire
        if ($request->isXmlHttpRequest()) { // Vérifie si la requête est AJAX
            // Récupérer les données du formulaire
            $emailOrUsername = $request->request->get('email');
            $password = $request->request->get('password');
            $remember = $request->request->get('remember');

            // Effectuer la logique d'authentification ici
            // Par exemple, vérifier les informations d'identification dans la base de données

            // Exemple de réponse pour indiquer le succès ou l'échec
            if ($emailOrUsername === 'test' && $password === '1234') { // Exemple de condition
                return new JsonResponse(['status' => 'success', 'message' => 'Connexion réussie !']);
            }

            return new JsonResponse(['status' => 'error', 'message' => 'Email ou mot de passe incorrect.']);
        }

        // Si la requête n'est pas AJAX, on retourne une réponse d'erreur
        return new JsonResponse(['status' => 'error', 'message' => 'Requête invalide.'], 400);
    }
}
