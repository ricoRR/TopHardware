<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Composant;
use App\Entity\Categorie;
use App\Repository\ComposantRepository;
use Symfony\Component\Serializer\Attribute\Groups;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class ComposantController extends AbstractController
{
    public function __construct(ComposantRepository $composantRepository)
    {
        $this->composantRepository = $composantRepository;
    }

    #[Route('/composants', name: 'app_composant')]
    public function index(EntityManagerInterface $entityManager,Request $request): JsonResponse
    {
            
        $quizz = $entityManager->getRepository(Composant::class)->findAll();

        $arrayCollection = array();

        foreach($quizz as $item) {

            $arrayCollection[] = array(
                'id' => $item->getId(),
                'type' => $item->getType(),
                'pp'=>$item->getPp(),
                'photos'=>$item->getPhoto(),
                'name'=>$item->getName(),
                'price'=>$item->getPrice(),
                'stripeid' => $item->getStripeId(),
                'description'=>$item->getDescription(),
                'amount'=> $item->getAmount(),
                'caractéristique'=>$item->getCaractéristique(),
                'views'=>$item->getViews(),
                'reduction'=>$item->getReduction(),
                'categorie' => $item->getCategorie() ? [
                    'id' => $item->getCategorie()->getId(),
                    'name' => $item->getCategorie()->getName()
                ] : null

            );
        }


      
      return new JsonResponse($arrayCollection);
    }
    
    
    #[Route('/composants_search', name: 'search_composants')]
    public function search(EntityManagerInterface $entityManager,Request $request): JsonResponse
    {
            
        $name = $request->query->get('q');

        if (!$name) {
            return new JsonResponse(['error' => 'Missing search parameter'], 400);
        }


        $composants = $entityManager->getRepository(Composant::class)->search($name);

        if (empty($composants)) {
            return new JsonResponse([]);
        }

        return $this->json($composants);
    }
     
    #[Route('/composants_search_categorie', name: 'search_composants_with_categorie')]
    public function searchWithCategorie(EntityManagerInterface $entityManager,Request $request): JsonResponse
    {
            
        $name = $request->query->get('q');
        $CategorieId = $request->query->get('c');

        if (!$name || !$CategorieId) {
            return new JsonResponse([]);
        }

       


        $composants = $entityManager->getRepository(Composant::class)->searchWithCategorie($name,$CategorieId);

        if (empty($composants)) {
            return new JsonResponse([]);
        }

        return $this->json($composants);
    }
    

    #[Route('/composants/{id}', name: 'get_composant', methods: ['GET'])]
    public function getComposant(EntityManagerInterface $entityManager, $id): JsonResponse
    {
        $composant = $entityManager->getRepository(Composant::class)->find($id);

        if (!$composant) {
            throw $this->createNotFoundException(
                'No composant found for id ' . $id
            );
        }

        $this->composantRepository->increment($id);

        $composantData = [
            'id' => $composant->getId(),
            'type' => $composant->getType(),
            'pp' => $composant->getPp(),
            'photos' => $composant->getPhoto(),
            'stripeid' => $composant->getStripeId(),
            'name' => $composant->getName(),
            'price' => $composant->getPrice(),
            'description' => $composant->getDescription(),
            'caractéristique' => $composant->getCaractéristique(),
            'details' => $composant->getDetails(),
            'hightlight' => $composant->getHighlight(),
            'reduction'=>$composant->getReduction(),
            'amount' => $composant->getAmount(),
            'categorie' => $composant->getCategorie() ? [
            'id' => $composant->getCategorie()->getId(),
            'name' => $composant->getCategorie()->getName()
        ] : null
        ];

        return new JsonResponse($composantData);
    }
    

    #[Route('/api/composants/{id}', name: 'update_composant', methods: ['PUT'])]
    #[IsGranted('ROLE_ADMIN')]
    public function UpdateComposants(EntityManagerInterface $entityManager, $id, Request $request, SerializerInterface $serializer): Response
    {
        $requestData = $request->getContent();
        if (!$requestData) {
            throw $this->createNotFoundException(
                'No Data to update'
            );
        }

        $composant = $entityManager->getRepository(Composant::class)->find($id);
        if (!$composant) {
            throw $this->createNotFoundException(
                'No composant found for id ' . $id
            );
        }

        $composantBody = $serializer->deserialize($requestData, Composant::class, 'json');
        if (!$composantBody) {
            throw $this->createNotFoundException(
                'The json format does not fit'
            );
        }

        $composant->setType($composantBody->getType());
        $composant->setPrice($composantBody->getPrice());
        $composant->setName($composantBody->getName());
        $composant->setDescription($composantBody->getDescription());
        $composant->setCaractéristique($composantBody->getCaractéristique());
        $composant->setPhoto($composantBody->getPhoto());
        $composant->setPp($composantBody->getPp());
        $composant->setDetails($composantBody->getDetails());
        $composant->setHightlight($composantBody->getHightlight());
        $composant->setAmount($composantBody->getAmount());
        $composant->setReduction($composantBody->getReduction());

        $entityManager->flush();

        return new Response('Composant updated!', 200);
    }

    #[Route('/api/composants/{id}', name: 'delete_composant', methods: ['DELETE'])]
    #[IsGranted('ROLE_ADMIN')]

    public function DeleteComposants(EntityManagerInterface $entityManager, $id): Response
    {
        if (!$id) {
            throw $this->createNotFoundException(
                'We need an id'
            );
        }

        $composant = $entityManager->getRepository(Composant::class)->find($id);
        if (!$composant) {
            throw $this->createNotFoundException(
                'No composant found for id ' . $id
            );
        }

        $entityManager->remove($composant);
        $entityManager->flush();

        return new Response('Composant deleted!', 200);
    }

    #[Route('/api/composants', name: 'create_composant', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function CreateComposants(EntityManagerInterface $entityManager, Request $request, SerializerInterface $serializer): Response
    {
        $data = $request->getContent();
        if (!$data) {
            throw $this->createNotFoundException(
                'No data '
            );
        }

        $composant = $serializer->deserialize($data, Composant::class, 'json');
        if (!$composant) {
            throw $this->createNotFoundException(
                'The json format do not fit'
            );
        }

        $entityManager->persist($composant);
        $entityManager->flush();

        return new Response('Composant created!', 201);
    }
}
