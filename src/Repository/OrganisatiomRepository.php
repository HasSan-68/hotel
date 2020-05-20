<?php

namespace App\Repository;

use App\Entity\Organisatiom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Organisatiom|null find($id, $lockMode = null, $lockVersion = null)
 * @method Organisatiom|null findOneBy(array $criteria, array $orderBy = null)
 * @method Organisatiom[]    findAll()
 * @method Organisatiom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrganisatiomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Organisatiom::class);
    }

    // /**
    //  * @return Organisatiom[] Returns an array of Organisatiom objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Organisatiom
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
