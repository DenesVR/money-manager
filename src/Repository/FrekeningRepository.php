<?php

namespace App\Repository;

use App\Entity\Afrekening;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Afrekening|null find($id, $lockMode = null, $lockVersion = null)
 * @method Afrekening|null findOneBy(array $criteria, array $orderBy = null)
 * @method Afrekening[]    findAll()
 * @method Afrekening[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FrekeningRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Afrekening::class);
    }

    // /**
    //  * @return Afrekening[] Returns an array of Afrekening objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Afrekening
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}