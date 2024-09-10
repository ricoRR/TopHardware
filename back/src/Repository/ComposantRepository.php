<?php

namespace App\Repository;

use App\Entity\Composant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Composant>
 */
class ComposantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Composant::class);
    }


    public function increment(int $id){

        $entityManager = $this->getEntityManager();

        $inc = $entityManager->createQuery(
            'UPDATE App\Entity\Composant c SET c.views = c.views + 1 WHERE c.id = :id'
        )->setParameter('id', $id);
        
        $inc->execute();
    }
    //    /**
    //     * @return Composant[] Returns an array of Composant objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Composant
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }


    public function search(string $q): array
    {
        $composants = $this->createQueryBuilder('p')
            ->select('p.id', 'p.name', 'p.description', 'p.price','p.pp')
            ->where('p.name LIKE :query')
            ->setParameter('query', '%' . $q . '%')
            ->getQuery()
            ->getArrayResult();


            if(empty($composants)){
                return [];
            }

            return $composants;
    }
    
    public function searchWithCategorie(string $q,string $categorieId): array
    {
        $qb = $this->createQueryBuilder('c')
            ->select('c.id', 'c.name', 'c.description', 'c.price', 'c.pp' , 'cat.id as categorie_id', 'cat.name as categorie_name')
            ->leftJoin('c.categorie', 'cat');

        if ($q !== null) {
            $qb->andWhere('c.name LIKE :query')
               ->setParameter('query', '%' . $q . '%');
        }

        if ($categorieId !== null) {
            $qb->andWhere('cat.id = :categorieId')
               ->setParameter('categorieId', $categorieId);
        }

        return $qb->getQuery()->getArrayResult();

          
    }
}
