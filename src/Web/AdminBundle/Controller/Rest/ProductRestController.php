<?php

namespace Web\AdminBundle\Controller\Rest;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ProductRestController extends Controller
{
    public function getProductsAction($id){
        $ar = array($id);
        $cats = $this->getDoctrine()->getRepository('WebAdminBundle:Categorie')->findOneById($id)->getFilles();
        foreach($cats as $cat){
            array_push($ar,$cat->getId());
            $cs = $this->getDoctrine()->getRepository('WebAdminBundle:Categorie')->findOneById($cat->getId())->getFilles();
            foreach($cs as $c){
                array_push($ar,$c->getId());
                $c2 = $this->getDoctrine()->getRepository('WebAdminBundle:Categorie')->findOneById($c->getId())->getFilles();
                foreach($c2 as $cc){
                    array_push($ar,$cc->getId());
                }
            }
        }
        $produits = $this->getDoctrine()->getRepository('WebAdminBundle:Produit')->findByCategorie($ar);
        return $produits;
    }
    
    public function lastProductAction(){
		$produits = $this->getDoctrine()->getRepository('WebAdminBundle:Produit')->findlast();
		return $produits;
	}	

    public function getCatProductAction($id){
        $produit = $this->getDoctrine()->getRepository('WebAdminBundle:Produit')->findByCategorie($id);
        return $produit;
    }

}
