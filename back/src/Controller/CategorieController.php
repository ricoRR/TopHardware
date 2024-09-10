<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Categorie;
use App\Entity\Composant;
use Symfony\Component\Serializer\Attribute\Groups;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class CategorieController extends AbstractController
{
    #[Route('/categorie', name: 'app_categorie')]
    public function index(EntityManagerInterface $entityManager,Request $request): JsonResponse
    {

        $categories = $entityManager->getRepository(Categorie::class)->findAll();

        $arrayCollection = array();

        foreach($categories as $item) {
            $arrayCollection[] = array(
                'id' => $item->getId(),
                'name' => $item->getName()
                

            );
        }


      

      return new JsonResponse($arrayCollection);
    }
    #[Route('/categorie/{name}', name: 'get_categorie', methods: ['GET'])]
    public function getCategorie(EntityManagerInterface $entityManager, $name): JsonResponse
    {
        $categorie = $entityManager->getRepository(Categorie::class)->findOneBy(['name' => $name]);

        if (!$categorie) {
            throw $this->createNotFoundException(
                'No categorie found for' . $name
            );
        }

        $composants = $categorie->getComposants()->map(function($composant) {
            return [
                'id' => $composant->getId(),
                'name' => $composant->getName(),
                'price' => $composant->getPrice(),
                'pp' => $composant->getPp(),
            ];
        })->toArray();
    
   
        return new JsonResponse($composants);
    }


    #[Route('/categorie_id/{id}', name: 'get_categorie_id', methods: ['GET'])]
    public function getCategorieWithId(EntityManagerInterface $entityManager, $id): JsonResponse
    {
        $categorie = $entityManager->getRepository(Categorie::class)->find($id);

        if (!$categorie) {
            throw $this->createNotFoundException(
                'No categorie found for id:' . $id
            );
        }

        $composants = $categorie->getComposants()->map(function($composant) {
            return [
                'id' => $composant->getId(),
                'name' => $composant->getName(),
                'price' => $composant->getPrice(),
                'pp' => $composant->getPp(),
            ];
        })->toArray();
    
   
        return new JsonResponse($composants);
    }
    

    #[Route('/api/categorie/{id}', name: 'update_categorie', methods: ['PUT'])]
    #[IsGranted('ROLE_ADMIN')]
    public function UpdateCategorie(EntityManagerInterface $entityManager, $id, Request $request, SerializerInterface $serializer): Response
    {
        $requestData = $request->getContent();
        if (!$requestData) {
            throw $this->createNotFoundException(
                'No Data to update'
            );
        }

        $categorie = $entityManager->getRepository(Categorie::class)->find($id);
        if (!$composant) {
            throw $this->createNotFoundException(
                'No categorie found for id ' . $id
            );
        }

        $categorieBody = $serializer->deserialize($requestData, Composant::class, 'json');
        if (!$categorieBody) {
            throw $this->createNotFoundException(
                'The json format does not fit'
            );
        }

        $categorie->setType($categorieBody->getType());


        $entityManager->flush();

        return new Response('Categorie updated!', 200);
    }

      
    
    

    #[Route('/api/categorie/{id}', name: 'delete_categorie', methods: ['DELETE'])]
     #[IsGranted('ROLE_ADMIN')]

    public function DeleteCategorie(EntityManagerInterface $entityManager, $id): Response
    {
        if (!$id) {
            throw $this->createNotFoundException(
                'We need an id'
            );
        }

        $categorie = $entityManager->getRepository(Categorie::class)->find($id);
        if (!$categorie) {
            throw $this->createNotFoundException(
                'No categorie found for id:' . $id
            );
        }

        $composants = $entityManager->getRepository(Composant::class)->findBy(['categorie' => $categorie]);

        foreach ($composants as $composant) {
            $entityManager->remove($composant);
        }

        $entityManager->remove($categorie);
        $entityManager->flush();

        return new Response('Categorie and all', 200);
    }

    #[Route('/api/categorie', name: 'create_categorie', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function CreateCategorie(EntityManagerInterface $entityManager, Request $request, SerializerInterface $serializer): Response
    {
        $data = $request->getContent();
        if (!$data) {
            throw $this->createNotFoundException(
                'No data '
            );
        }

        $categorie = $serializer->deserialize($data, Categorie::class, 'json');
        if (!$categorie) {
            throw $this->createNotFoundException(
                'The json format do not fit'
            );
        }

        $entityManager->persist($categorie);
        $entityManager->flush();

        return new Response('Categorie created!', 201);
    }
}
