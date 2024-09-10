<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/api/user', name: 'app_user', methods: ['GET'])]
    public function getCurrentUser(#[CurrentUser] ?UserInterface $user): JsonResponse
    {
        if (!$user) {
            return $this->json(['message' => 'User not authenticated'], JsonResponse::HTTP_UNAUTHORIZED);
        }

        return $this->json([
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'roles' => $user->getRoles(),
        ]);
    }
}
