<?php

namespace Web\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Web\AdminBundle\Entity\Formu;

class ProduitController extends Controller
{
    public function produitAction($page)
    {
        $categorie = $this->getDoctrine()->getRepository('WebAdminBundle:Categorie')->findOneByLien($page);
        return $this->render('WebWebBundle:Default:produit.html.twig', array(
            'categorie' => $categorie,
            "type" => 1,
            "athis" => $this
        ));
    }
    public function catProduitAction($page,$cat)
    {
        $categorie = $this->getDoctrine()->getRepository('WebAdminBundle:Categorie')->findOneByLien($page);
        $categ = $this->getDoctrine()->getRepository('WebAdminBundle:Categorie')->findOneByLien($cat);
        return $this->render('WebWebBundle:Default:produit.html.twig', array(
            'categorie' => $categorie,
            'moncat' => $categ,
            'type' => 2,
            "athis" => $this
        ));
    }
    public function sousCatProduitAction($page,$cat,$souscat)
    {
        $categorie = $this->getDoctrine()->getRepository('WebAdminBundle:Categorie')->findOneByLien($page);
        $categ = $this->getDoctrine()->getRepository('WebAdminBundle:Categorie')->findOneByLien($souscat);

        return $this->render('WebWebBundle:Default:produit.html.twig', array(
            'categorie' => $categorie,
            'moncat' => $categ,
            'type' => 3,
            "athis" => $this
        ));
    }
    public function seulProduitAction(Request $request,$prod)
    {
        $produit = $this->getDoctrine()->getRepository('WebAdminBundle:Produit')->findOneByLien($prod);
        $medor = $this->getDoctrine()->getRepository('WebAdminBundle:Categorie')->findOneByNom('Medor');
        $categorie = $produit->getCategorie();
        while($categorie->getMere() !== $medor){
            $categorie = $categorie->getMere();
        }
        $msj = false;
        if ('POST' === $request->getMethod()) {
            $form = new Formu();
            $type = $request->request->get('type');
            $objet = implode(" / ",$request->request->get('objet'));
            $nom = $request->request->get('nom');
            $email = $request->request->get('email');
            $message = $request->request->get('message');
            $prodid = $request->request->get('produitid');
            $form->setNom($nom);
            $form->setType($type);
            $form->setObjet($objet);
            $form->setEmail($email);
            $form->setMessage($message);
            $form->setProduit($produit);
            $form->setEtat(0);
            $em = $this->getDoctrine()->getManager();
            $em->persist($form);
            $em->flush();
            $msj=true;
        }
        return $this->render('WebWebBundle:Default:oneproduct.html.twig', array(
            'categorie' => $categorie,
            'produit' => $produit,
            'msj' => $msj,
        ));
    }
    public function chercherAction(Request $request)
    {
        $categorie = $this->getDoctrine()->getRepository('WebAdminBundle:Categorie')->findOneByLien('equipement-cabinet');
        $produits = array();
        $findproduits = array();
        $page = $request->query->get('p', 1);
        if($request->query->get('s')!=null){
            $findproduits = $this->getDoctrine()->getRepository('WebAdminBundle:Produit')->chercher($request->query->get('s'));
        }
        $produits  = $this->get('knp_paginator')->paginate($findproduits,$page , $limit = 9);
        return $this->render('WebWebBundle:Default:chercher.html.twig', array(
            'categorie' => $categorie,
            'produits' => $produits,
            'rq' => $request->query->get('s'),
        ));
    }
}