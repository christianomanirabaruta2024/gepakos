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
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class LoginController extends AbstractController
{
    private $authentificationsRepository;

    public function __construct(AuthentificationsRepository $authentificationsRepository)
    {
        $this->authentificationsRepository = $authentificationsRepository;
    }

    #[Route('/login', name: 'app_login', methods: ['GET', 'POST'])]
    public function index(
        Request $request,
        SessionInterface $session,
        UserPasswordHasherInterface $passwordHasher
    ): Response {
        if ($request->isMethod('GET')) {
            return $this->render('login/index.html.twig');
        }

        if ($request->isXmlHttpRequest()) { // Requête AJAX
            $email = $request->request->get('email');
            $password = $request->request->get('password');
            $rememberMe = $request->request->get('remember');

            $user = $this->authentificationsRepository->findOneBy(['email' => $email]);

            if ($user && $passwordHasher->isPasswordValid($user, $password)) {
                // Gestion "Se souvenir de moi"
                if ($rememberMe) {
                    $cookie = new Cookie(
                        'email',
                        $user->getEmail(),
                        time() + 3600, // Expiration dans 1 heure
                        '/',
                        null,
                        true,  // HTTPS uniquement
                        true   // HTTP-only
                    );
                    $response = new RedirectResponse('/');
                    $response->headers->setCookie($cookie);
                    return $response;
                }

                // Gestion avec session
                $session->set('user_email', $user->getEmail());
                $session->set('user_id', $user->getId());

                return new RedirectResponse('/');
            }

            // Message d'erreur générique
            return new JsonResponse(['status' => 'error', 'message' => 'Identifiants incorrects.']);
        }

        return new JsonResponse(['status' => 'error', 'message' => 'Requête invalide.'], 400);
    }
}
