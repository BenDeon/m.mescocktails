<?php

namespace App\Repository;

use App\Entity\Ingredients;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class IngredientsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry){
        parent::__construct($registry, Ingredients::class);
    }

    public function findAllByCriterias($criteres): array{
      $qb = $this->createQueryBuilder('c')
        ->orderBy('c.nom','ASC');
        if($criteres){
          foreach($criteres as $critere){
            $qb->andWhere('c.'.$critere->sql);
            $qb->setParameter($critere->flag, $critere->value);
          }
        }
      $query = $qb->getQuery();
      return $query->getResult();
    }

    public function findAllCocktailIngredients($cocktail_id): array{
      $qb = $this->createQueryBuilder('i')
        ->select('i.nom', 'c.quantite', 'i.type', 'm.mesure')
        ->leftJoin(
          'App\Entity\Cockingr',
          'c',
          \Doctrine\ORM\Query\Expr\Join::WITH,
          'c.ingredient = i.id')
        ->leftJoin(
          'App\Entity\Mesures',
          'm',
          \Doctrine\ORM\Query\Expr\Join::WITH,
          'm.id = c.type')
        ->where('c.cocktail = :cocktail_id')
        ->setParameter('cocktail_id',$cocktail_id)
        ->orderBy('i.type','ASC')
        ->orderBy('i.nom','ASC');
      $query = $qb->getQuery();
      return $query->getResult();
    }
}
