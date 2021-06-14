<?php

namespace App\Repository;

use App\Entity\Cockingr;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CockingrRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry){
        parent::__construct($registry, Cockingr::class);
    }

    public function findAllCocktailsByIngredientsSearch($ingredients): array{

      $qb = $this->createQueryBuilder('c')
        ->select('c.cocktail')
        ->where('c.id != 0');
      if($ingredients){
        $i=0;
        foreach($ingredients as $ingredient){
          $qb->andWhere('c.ingredient = :ingredient'.$i);
          $qb->setParameter('ingredient'.$i, $ingredient['id']);
          $i++;
        }
      }
      $query = $qb->getQuery();
      return $query->getResult();

    }
}
