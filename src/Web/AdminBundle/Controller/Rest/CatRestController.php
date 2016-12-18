<?php

namespace Web\AdminBundle\Controller\Rest;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class CatRestController extends Controller
{
    public function getCatAllAction(){
        $cats = $this->getDoctrine()->getRepository('WebAdminBundle:Categorie')->findAll();
        return $cats;
    }
    
    public function getCatFillesAction($lien){
        $cat = $this->getDoctrine()->getRepository('WebAdminBundle:Categorie')->findOneByLien($lien);
        return $cat->getFilles();
    }

    public function getCatAction($id){
        $cat = $this->getDoctrine()->getRepository('WebAdminBundle:Categorie')->findOneById($id);
        if(!is_object($cat)){
            throw $this->createNotFoundException();
        }
        return $cat;
    }

    public function getCatlAction($lien){
        $cat = $this->getDoctrine()->getRepository('WebAdminBundle:Categorie')->findOneByLien($lien);
        if(!is_object($cat)){
            throw $this->createNotFoundException();
        }
        return $cat;
    }



}
