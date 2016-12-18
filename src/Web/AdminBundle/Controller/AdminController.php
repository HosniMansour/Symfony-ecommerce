<?php

namespace Web\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function adminAction()
    {
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('WebAdminBundle:Produit')->findlast();
        $query = $em->createQuery('SELECT c FROM UserUserBundle:User c ORDER BY c.id DESC');
        $users = $query->setMaxResults(5)->getResult();

        $cp = $em->createQuery('SELECT COUNT(a) FROM WebAdminBundle:Produit a')->getSingleScalarResult();
        $cu = $em->createQuery('SELECT COUNT(a) FROM UserUserBundle:User a')->getSingleScalarResult();
        $cpa = $em->createQuery('SELECT COUNT(a) FROM WebAdminBundle:Partenaires a')->getSingleScalarResult();
        $co = $em->createQuery('SELECT COUNT(a) FROM WebAdminBundle:Commande a')->getSingleScalarResult();;

        return $this->render('WebAdminBundle:Default:layout/index.html.twig',array(
            "cp" => $cp,
            "cu" => $cu,
            "co" => $co,
            "cpa" => $cpa,
            "produits" => $produits,
            "users" => $users,
        ));
    }
}
