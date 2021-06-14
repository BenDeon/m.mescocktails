<?php

namespace App\Repository;

use App\Entity\CocktailsDetails;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CocktailsDetails|null find($id, $lockMode = null, $lockVersion = null)
 * @method CocktailsDetails|null findOneBy(array $criteria, array $orderBy = null)
 * @method CocktailsDetails[]    findAll()
 * @method CocktailsDetails[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CocktailsDetailsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CocktailsDetails::class);
    }

    // /**
    //  * @return CocktailsDetails[] Returns an array of CocktailsDetails objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CocktailsDetails
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
