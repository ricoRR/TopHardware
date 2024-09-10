<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class LoginController extends AbstractController
{
   
    #[Route('/login', name: 'app_login', methods: ['POST'])]
    public function login(): JsonResponse
    {

        return $this->json([
            'message' => 'Missing credential',
        ], JsonResponse::HTTP_UNAUTHORIZED);
    }


    #[Route('/api/login_check', name: 'api_login_check', methods: ['POST'])]
    public function loginCheck()
    {
        throw new \LogicException('blank');
    }
}
