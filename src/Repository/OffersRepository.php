<?php

namespace App\Repository;

use App\Entity\Offers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

/**
 * @method Offers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offers[]    findAll()
 * @method Offers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offers::class);
    }

    public function findAllArray($query)
    {
        $qb = $this
            ->createQueryBuilder('a')
            ->select('a')
            ->orderBy('a.offer_name', 'asc')
            ->where('a.offer_name LIKE :query')
            ->setParameter('query', '%' . $query . '%');
        return $qb->getQuery()->getResult(Query::HYDRATE_ARRAY);
        // return $qb->getQuery()->getArrayResult(); // Hydratation array, équivalent à la ligne du dessus
    }

    public function findLast4(){
        $qb = $this
        ->createQueryBuilder('a')
        ->select('a')
        ->orderBy('a.offer_name', 'asc');
        return $qb->getQuery()->getResult(Query::HYDRATE_ARRAY);
    }
    
    // /**
    //  * @return Offers[] Returns an array of Offers objects
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
    public function findOneBySomeField($value): ?Offers
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
