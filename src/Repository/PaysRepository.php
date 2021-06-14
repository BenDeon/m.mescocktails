<?php

namespace App\Repository;

use App\Entity\Pays;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PaysRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pays::class);
    }

    public function getAll(): array{
      return $this->findAll();
    }

    public function getAllLinked(): array{
      $qb = $this->createQueryBuilder('p')
        ->select('p.id, p.nom, p.code')
        ->innerJoin(
          'App\Entity\CocktailsDetails',
          'd',
          \Doctrine\ORM\Query\Expr\Join::WITH,
          'p.code = d.origine')
        ->groupBy('p.id')
        ->orderBy('p.nom','ASC');
      $query = $qb->getQuery();
      return $query->getResult();
    }
}
