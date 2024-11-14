<?php

namespace App\Controller;

use App\Repository\AuthentificationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class LoginController extends AbstractController
{
    private $authentificationsRepository;

    public function __construct(AuthentificationsRepository $authentificationsRepository)
    {
        $this->authentificationsRepository = $authentificationsRepository;
    }

    #[Route('/login', name: 'app_login', methods: ['GET', 'POST'])]
    public function index(Request $request, SessionInterface $session): Response
    {
        if ($request->isMethod('GET')) {
            return $this->render('login/index.html.twig', [
                'controller_name' => 'LoginController',
            ]);
        }

        if ($request->isXmlHttpRequest()) { // Requête AJAX
            $email = $request->request->get('email');
            $password = $request->request->get('password');
            $checkbox = $request->request->get('remember');
            
            $user = $this->authentificationsRepository->findOneBy(['email' => $email]);

            if ($user && $user->getPassword() === $password) {
                if ($checkbox) {
                    // Se souvenir de l'utilisateur avec un cookie
                    $cookieValue = $user->getEmail();
                    $cookie = new Cookie(
                        'email',
                        $cookieValue,
                        time() + 3600, // Expiration dans 1 heure
                        '/',
                        null,
                        false,
                        true,
                        false
                    );

                    $response = new RedirectResponse('/');
                    $response->headers->setCookie($cookie);
                    return $response;
                }

                // Utiliser la session si "Se souvenir de moi" n'est pas coché
                $session->set('user_email', $user->getEmail());
                $session->set('user_id', $user->getId());

                // Rediriger vers la page d'accueil
                return new RedirectResponse('/');
            }

            // Si l'authentification échoue
            return new JsonResponse(['status' => 'error', 'message' => 'Email ou mot de passe incorrect.']);
        }

        // Réponse pour les requêtes non AJAX
        return new JsonResponse(['status' => 'error', 'message' => 'Requête invalide.'], 400);
    }
}
