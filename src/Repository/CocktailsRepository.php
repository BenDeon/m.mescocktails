<?php

namespace App\Repository;

use App\Entity\Cocktails;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class CocktailsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry){
        parent::__construct($registry, Cocktails::class);
    }

    public function getAll(): array{
      return $this->findBy([
        'actif' => '1',
        'variante' => '0',
        'refus' => NULL
      ],['nom' => 'ASC']);
    }
/*
    public function findAllByCriterias($criteres,$ingredients): array{
      $qb = $this->createQueryBuilder('c')
        ->select('c.id, c.nom, c.typec, d.verre, d.img')
        ->addSelect('(SELECT GROUP_CONCAT(i.nom order by i.type, i.nom SEPARATOR \', \') FROM App\Entity\Ingredients AS i WHERE i.id IN (SELECT (pivot_i.ingredient) FROM App\Entity\Cockingr AS pivot_i WHERE pivot_i.cocktail = c.id)) as ingredients')
        ->leftJoin(
          'App\Entity\CocktailsDetails',
          'd',
          \Doctrine\ORM\Query\Expr\Join::WITH,
          'c.id = d.cocktail')
        ->where('c.actif = 1')
        ->andWhere('c.variante = 0')
        ->andWhere('c.refus IS NULL')
        ->orderBy('c.nom','ASC');
      if($criteres){
        foreach($criteres as $critere){
          $qb->andWhere('c.'.$critere->sql);
          $qb->setParameter($critere->flag, $critere->value);
        }
      }
      if($ingredients){
        $qb->andWhere('c.id IN (:ingredients)');
        $qb->setParameter('ingredients', $ingredients);
      }
      $query = $qb->getQuery();
      return $query->getResult();
    }
*/
    public function findAllByCriterias($criteres, $ingredients, $origine): array{
      $params = array();
      $conn = $this->getEntityManager()->getConnection();
      $sql = 'SELECT
        c.id,
        c.nom,
        c.typec,
        d.verre,
        d.img,
        (SELECT
          GROUP_CONCAT(i.nom order by i.type, i.nom SEPARATOR \', \')
          FROM ingredients AS i
          WHERE i.id IN (SELECT
            (pivot_i.ingredient)
            FROM cockingr AS pivot_i
            WHERE pivot_i.cocktail = c.id))
        as ingredients
        FROM cocktails as c
        LEFT JOIN cocktails_details as d ON c.id = d.cocktail
        WHERE c.actif = 1
        AND c.variante = 0
        AND c.refus IS null';
        if($criteres){
          foreach($criteres as $critere){
            $sql .= ' AND c.'.$critere->sql;
            $params = $params + array($critere->flag => $critere->value);
          }
        }
        if($ingredients){
          $i=0;
          foreach($ingredients as $ingredient){
            $sql .= ' AND :ingredient'.$i.' IN (SELECT ingredient FROM cockingr AS e WHERE e.cocktail=c.id)';
            $params = $params + array('ingredient'.$i => $ingredient['id']);
            $i++;
          }
        }
        if($origine){
          $origineVals = reset($origine);
          $sql .= ' AND d.origine = :origine';
          $params = $params + array('origine' => $origineVals['code']);
        }
      $sql .= ' ORDER BY c.nom ASC';

      $stmt = $conn->prepare($sql);
      $stmt->execute($params);
      return $stmt->fetchAll();
    }
}
