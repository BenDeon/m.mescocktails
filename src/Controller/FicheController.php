<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Service\TypesCocktails;
use App\Service\Methodes;
use App\Service\Verres;

use App\Entity\Cocktails;
use App\Entity\Cockingr;
use App\Entity\CocktailsNote;
use App\Entity\Ingredients;
use App\Entity\Pays;

class FicheController extends AbstractController{

  /**
  * @Route(
  *    "/cocktail/{cocktail_id}-{cocktail}.html",
  *    methods={"GET","HEAD"},
  *    name="FicheController.index",
  *    requirements={"cocktail_id"="\d+","cocktail"=".+"}
  *  )
  */
  public function index(TypesCocktails $typesCocktails, Methodes $methodes, Verres $verres, Request $request){
    $cocktail_id = $request->get('cocktail_id');
    $cocktail = $this->getDoctrine()
      ->getRepository(Cocktails::class)
      ->find($cocktail_id);
    $cocktailDetails = $cocktail->getDetails();
    $ingredients = $this->getDoctrine()
      ->getRepository(Ingredients::class)
      ->findAllCocktailIngredients($cocktail->getId());
    $type = $typesCocktails->loadTypeParam($cocktail->getTypec());
    $methode = $methodes->getMethode($cocktailDetails->getMethode());
    $verre = $verres->getVerre($cocktailDetails->getVerre());
    $pays = $this->getDoctrine()
      ->getRepository(Pays::class)
      ->findOneBy(array('code' => $cocktailDetails->getOrigine()));
    return $this->render('fiche.html.twig', [
      'type'=>$type,
      'methode'=>$methode,
      'verre'=>$verre,
      'cocktail'=>$cocktail,
      'cocktailDetails'=>$cocktailDetails,
      'ingredients'=>$ingredients,
      'pays'=>$pays,
      'noSearch'=>true,
      'noFooter'=>true,
      'noMenu'=>true
    ]);
  }

}
