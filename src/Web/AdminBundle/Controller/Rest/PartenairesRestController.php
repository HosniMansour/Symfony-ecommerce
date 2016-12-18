<?php

namespace Web\AdminBundle\Controller\Rest;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class PartenairesRestController extends Controller
{
    public function getPartenairesAction(){
        $cats = $this->getDoctrine()->getRepository('WebAdminBundle:Partenaires')->findAll();

        return $cats;
    }

}