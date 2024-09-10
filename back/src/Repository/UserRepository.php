<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<User>
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $user::class));
        }

        $user->setPassword($newHashedPassword);
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

    public function findUsersLoggedInLastMonth(): array
    {
        $qb = $this->createQueryBuilder('u');
        $qb->where('u.last_login >= :lastMonth')
           ->setParameter('lastMonth', new \DateTime('-1 month'));
    
        return $qb->getQuery()->getResult();
    }
    
    
    public function findUsersNotLoggedInLastMonth(): array
    {
        $qb = $this->createQueryBuilder('u');
        $qb->where('u.last_login < :lastMonth OR u.last_login IS NULL')
           ->setParameter('lastMonth', new \DateTime('-1 month'));
    
        return $qb->getQuery()->getResult();
    }
    

    public function countUser(\DateInterval $interval): int
    {
        $qb = $this->createQueryBuilder('u');
        $qb->select('COUNT(u)')
           ->where('u.last_login > :date')
           ->setParameter('date', (new \DateTime('now'))->sub($interval));
    
        return $qb->getQuery()->getSingleScalarResult();
    }


    //    /**
    //     * @return User[] Returns an array of User objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('u.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?User
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

}

