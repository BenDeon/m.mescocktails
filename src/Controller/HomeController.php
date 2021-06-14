<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

use App\Service\TypesCocktails;

use App\Entity\Cocktails;
use App\Entity\Cockingr;
use App\Entity\Ingredients;
use App\Entity\Pays;

class HomeController extends AbstractController{

  private $criteres_array = array();
  private $session;

  public function __construct(SessionInterface $session){
    $this->session = $session;
  }

  private function getCocktailsList($criteres = NULL, $sessionIngredients = NULL, $sessionOrigine = NULL) : array{
    return $this->getDoctrine()
      ->getRepository(Cocktails::class)
      ->findAllByCriterias($criteres, $sessionIngredients, $sessionOrigine);
  }

  private function getCocktailsListWithIngredients() : array{
    return $this->getDoctrine()
      ->getRepository(Cocktails::class)
      ->findAllWithIngredients($this->session->get('ingredientsSearch'));
  }

  private function getIngredientsList($criteres = NULL) : array{
    return $this->getDoctrine()
      ->getRepository(Ingredients::class)
      ->findAllByCriterias($criteres);
  }

  private function getOriginesList() : array{
    return $this->getDoctrine()
      ->getRepository(Pays::class)
      ->getAllLinked();
  }

  private function addSearchCriterias($field, $condition, $flag, $value){
    return array_push($this->criteres_array,[
     'sql' => $field.' '.$condition.' :'.$flag,
     'flag' => $flag,
     'value' => $value
    ]);
  }

  private function setIngredientsSearchSession($ingredient, $data){
    $sessionIngredients = $this->session->get('ingredientsSearch');
    if(empty($sessionIngredients)){
      $this->session->set('ingredientsSearch',$data);
    }
    else{
      if(!array_key_exists($ingredient,$sessionIngredients)){
        $sessionIngredients = $sessionIngredients + $data;
      }
      else{
        unset($sessionIngredients[$ingredient]);
      }
    $this->session->set('ingredientsSearch',$sessionIngredients);
    }
  }

  private function setOrigineSearchSession($origine, $data){
    $sessionOrigine = $this->session->get('origineSearch');
    if(empty($sessionOrigine)){
      $this->session->set('origineSearch',$data);
    }
    else{
      if(!array_key_exists($origine,$sessionOrigine)){
        $this->session->remove('origineSearch');
        $this->session->set('origineSearch',$data);
      }
      else{
        $this->session->remove('origineSearch');
      }
    }
  }

  private function loadList($type, $request){
    $criteres_array = false;
    $sessionIngredients = $this->session->get('ingredientsSearch');
    $sessionOrigine = (array) $this->session->get('origineSearch');
    $origines = $this->getOriginesList();
    $recherche = $request->get('recherche')?$request->get('recherche'):($this->session->get('recherche')?$this->session->get('recherche'):'');
    if($type['code'] != ''){
      $this->addSearchCriterias('typec', '=', 'typec', $type['code']);
    }
    if($recherche){
      $this->session->set('recherche', $recherche);
      $this->addSearchCriterias('nom', 'LIKE', 'recherche', '%'.$recherche.'%');
    }
    if($request->get('origine')){
      $data = $this->getDoctrine()
        ->getRepository(Pays::class)
        ->findOneBy(['code' => $request->get('origine')]);
      if(!isset($sessionOrigine[$request->get('origine')])){
        $criteres_origine[$data->getId()] = ['code' => $data->getCode(), 'nom' => $data->getNom()];
        $this->setOrigineSearchSession($data->getId(), $criteres_origine);
        $sessionOrigine = $criteres_origine;
      }
    }
    if($request->get('ingredients')){
      $ingredients = explode(',',$request->get('ingredients'));
      foreach($ingredients as $ingredient){
        $data = $this->getDoctrine()
          ->getRepository(Ingredients::class)
          ->find($ingredient);
        if(!isset($sessionIngredients[$ingredient])){
          $criteres_ingredients[$data->getId()] = ['id' => $data->getId(), 'nom' => $data->getNom()];
          $this->setIngredientsSearchSession($data->getId(), $criteres_ingredients);
          $sessionIngredients = $this->session->get('ingredientsSearch');
        }
      }
    }
    $criteres = json_decode(json_encode($this->criteres_array), FALSE);
    $cocktails = $this->getCocktailsList($criteres, $sessionIngredients, $sessionOrigine);
    return $this->render('home.html.twig', [
      'type'=>$type,
      'recherche'=>$recherche,
      'cocktails'=>$cocktails,
      'recherche_ingredients'=>$sessionIngredients,
      'origines'=>$origines,
      'recherche_origine'=>reset($sessionOrigine),
      'noBackToList'=>true,
      'noMenu'=>false
    ]);
  }
  /**
  * @Route(
  *    "/",
  *    methods={"GET","HEAD"},
  *    name="HomeController.index"
  *  )
  */
  public function index(TypesCocktails $typesCocktails, Request $request) : Response{
    $type = $typesCocktails->loadTypeParam('');
    return $this->loadList($type, $request);
  }

  /**
  * @Route(
  *    "/long-drink",
  *    methods={"GET","HEAD"},
  *    name="HomeController.longDrink"
  *  )
  */

  public function longDrink(TypesCocktails $typesCocktails, Request $request) : Response{
    $type = $typesCocktails->loadTypeParam('ld');
    return $this->loadList($type, $request);
  }
  /**
  * @Route(
  *    "/short-drink",
  *    methods={"GET","HEAD"},
  *    name="HomeController.shortDrink"
  *  )
  */
  public function shortDrink(TypesCocktails $typesCocktails, Request $request) : Response{
    $type = $typesCocktails->loadTypeParam('sd');
    return $this->loadList($type, $request);
  }
  /**
  * @Route(
  *    "/sans-alcool",
  *    methods={"GET","HEAD"},
  *    name="HomeController.sansAlcool"
  *  )
  */
  public function sansAlcool(TypesCocktails $typesCocktails, Request $request) : Response{
    $type = $typesCocktails->loadTypeParam('sa');
    return $this->loadList($type, $request);
  }
  /**
  * @Route(
  *    "/recherche",
  *    methods={"POST","HEAD"},
  *    name="HomeController.cocktailSearch"
  *  )
  */
  public function cocktailSearch(TypesCocktails $typesCocktails, Request $request) : Response{
    if(!$request->isXmlHttpRequest()){
      $content = $this->renderView('error.html.twig',[
        'error' => 'Error:x40301',
        'message' => 'Action non autorisée'
      ]);
      return new Response($content,Response::HTTP_FORBIDDEN);
    }
    $sessionIngredients = $this->session->get('ingredientsSearch');
    $sessionOrigine = (array) $this->session->get('origineSearch');
    $origines = $this->getOriginesList();
    $token = $request->get('_token');
    if (!$this->isCsrfTokenValid('search-cocktail', $token)){
      $content = $this->renderView('error.html.twig',[
        'error' => 'Error:x40601',
        'message' => 'Identifiant de requête incorrect'
      ]);
      return new Response($content,Response::HTTP_NOT_ACCEPTABLE);
    }
    $recherche = $request->get('recherche');
    $this->session->set('recherche', $recherche);
    $type = $typesCocktails->loadTypeParam($request->get('type'));
    $this->criteres_array = array();
    if($type['code']!=''){
      $this->addSearchCriterias('typec', '=', 'typec', $type['code']);
    }
    $this->addSearchCriterias('nom', 'LIKE', 'recherche', '%'.$recherche.'%');
    $criteres = json_decode(json_encode($this->criteres_array), FALSE);
    $cocktails = $this->getCocktailsList($criteres, $sessionIngredients, $sessionOrigine);
    return $this->render('cocktails.list.html.twig', [
      'type'=>$type,
      'recherche'=>$recherche,
      'cocktails'=>$cocktails,
      'recherche_ingredients'=>$sessionIngredients,
      'recherche_origine'=>reset($sessionOrigine)
    ]);
  }
  /**
  * @Route(
  *    "/recherche/ingredient",
  *    methods={"POST","HEAD"},
  *    name="HomeController.ingredientSearch"
  *  )
  */
  public function ingredientSearch(Request $request) : Response{
    if(!$request->isXmlHttpRequest()){
      $content = $this->renderView('error.html.twig',[
        'error' => 'Error:x40302',
        'message' => 'Action non autorisée'
      ]);
      return new Response($content,Response::HTTP_FORBIDDEN);
    }
    $token = $request->get('_token');
    if (!$this->isCsrfTokenValid('search-ingredient', $token)){
      $content = $this->renderView('error.html.twig',[
        'error' => 'Error:x40602',
        'message' => 'Identifiant de requête incorrect'
      ]);
      return new Response($content,Response::HTTP_NOT_ACCEPTABLE);
    }
    $recherche = $request->get('recherche_ingredient');
    if($recherche){
      $this->addSearchCriterias('nom', 'LIKE', 'recherche', '%'.$recherche.'%');
    }
    $criteres = json_decode(json_encode($this->criteres_array), FALSE);
    $ingredients = $this->getIngredientsList($criteres);
    return $this->render('ingredients.list.html.twig', ['recherche'=>$recherche, 'ingredients'=>$ingredients]);
  }
  /**
  * @Route(
  *    "/recherche/ingredient/add",
  *    methods={"POST","HEAD"},
  *    name="HomeController.ingredientAdd"
  *  )
  */
  public function addIngredientToCriterias(Request $request) : Response{
    if(!$request->isXmlHttpRequest()){
      $content = $this->renderView('error.html.twig',[
        'error' => 'Error:x40303',
        'message' => 'Action non autorisée'
      ]);
      return new Response($content,Response::HTTP_FORBIDDEN);
    }
    $token = $request->get('_token');
    if (!$this->isCsrfTokenValid('add-ingredient', $token)){
      $content = $this->renderView('error.html.twig',[
        'error' => 'Error:x40603',
        'message' => 'Identifiant de requête incorrect'
      ]);
      return new Response($content,Response::HTTP_NOT_ACCEPTABLE);
    }
    $ingredient = $request->get('ajout_ingredient');
    $data = $this->getDoctrine()
      ->getRepository(Ingredients::class)
      ->find($ingredient);
    $criteres[$data->getId()] = ['id' => $data->getId(), 'nom' => $data->getNom()];
    $this->setIngredientsSearchSession($data->getId(), $criteres);
    return new JsonResponse('true',JsonResponse::HTTP_OK);
  }
  /**
  * @Route(
  *    "/recherche/ingredient/del",
  *    methods={"POST","HEAD"},
  *    name="HomeController.ingredientDel"
  *  )
  */
  public function delIngredientFromCriterias(Request $request) : Response{
    if(!$request->isXmlHttpRequest()){
      $content = $this->renderView('error.html.twig',[
        'error' => 'Error:x40304',
        'message' => 'Action non autorisée'
      ]);
      return new Response($content,Response::HTTP_FORBIDDEN);
    }
    $token = $request->get('_token');
    if (!$this->isCsrfTokenValid('del-ingredient', $token)){
      $content = $this->renderView('error.html.twig',[
        'error' => 'Error:x40604',
        'message' => 'Identifiant de requête incorrect'
      ]);
      return new Response($content,Response::HTTP_NOT_ACCEPTABLE);
    }
    $ingredient = $request->get('suppression_ingredient');
    $criteres = array();
    $this->setIngredientsSearchSession($ingredient, $criteres);
    return new JsonResponse('true',JsonResponse::HTTP_OK);
  }
  /**
  * @Route(
  *    "/recherche/origine/manage",
  *    methods={"POST","HEAD"},
  *    name="HomeController.origineManage"
  *  )
  */
  public function manageOrigineCriterias(Request $request) : Response{
    if(!$request->isXmlHttpRequest()){
      $content = $this->renderView('error.html.twig',[
        'error' => 'Error:x40305',
        'message' => 'Action non autorisée'
      ]);
      return new Response($content,Response::HTTP_FORBIDDEN);
    }
    $token = $request->get('_token');
    if (!$this->isCsrfTokenValid('manage-origine', $token)){
      $content = $this->renderView('error.html.twig',[
        'error' => 'Error:x40605',
        'message' => 'Identifiant de requête incorrect'
      ]);
      return new Response($content,Response::HTTP_NOT_ACCEPTABLE);
    }
    $origine = $request->get('origine');
    $data = $this->getDoctrine()
      ->getRepository(Pays::class)
      ->find($origine);
    $criteres[$data->getId()] = ['code' => $data->getCode(), 'nom' => $data->getNom()];
    $this->setOrigineSearchSession($data->getId(), $criteres);
    return new JsonResponse('true',JsonResponse::HTTP_OK);
  }
  /**
  * @Route(
  *    "/recherche/reset",
  *    methods={"POST","HEAD"},
  *    name="HomeController.searchReset"
  *  )
  */
  public function searchReset(Request $request) : Response{
    if(!$request->isXmlHttpRequest()){
      $content = $this->renderView('error.html.twig',[
        'error' => 'Error:x40306',
        'message' => 'Action non autorisée'
      ]);
      return new Response($content,Response::HTTP_FORBIDDEN);
    }
    $token = $request->get('_token');
    if (!$this->isCsrfTokenValid('search-reset', $token)){
      $content = $this->renderView('error.html.twig',[
        'error' => 'Error:x40606',
        'message' => 'Identifiant de requête incorrect'
      ]);
      return new Response($content,Response::HTTP_NOT_ACCEPTABLE);
    }
    $this->session->remove('origineSearch');
    $this->session->remove('ingredientsSearch');
    return new JsonResponse('true',JsonResponse::HTTP_OK);
  }
  /**
  * @Route(
  *    "/mentions-legales.html",
  *    methods={"GET","HEAD"},
  *    name="HomeController.mentionsLegales",
  *  )
  */
  public function mentionsLegales(){
    return $this->render('mentions.legales.html.twig', [
      'noSearch'=>true,
      'noFooter'=>true,
      'noMenu'=>true
    ]);
  }
  /**
  * @Route(
  *    "/conditions-utilisation.html",
  *    methods={"GET","HEAD"},
  *    name="HomeController.conditionsUtilisation",
  *  )
  */
  public function conditionsUtilisation(){
    return $this->render('conditions.utilisation.html.twig', [
      'noSearch'=>true,
      'noFooter'=>true,
      'noMenu'=>true
    ]);
  }
}
