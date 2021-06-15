<?php

namespace App\Repository;

use App\Entity\DatesPrices;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DatesPrices|null find($id, $lockMode = null, $lockVersion = null)
 * @method DatesPrices|null findOneBy(array $criteria, array $orderBy = null)
 * @method DatesPrices[]    findAll()
 * @method DatesPrices[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DatesPricesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DatesPrices::class);
    }

    // /**
    //  * @return DatesPrices[] Returns an array of DatesPrices objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DatesPrices
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
