<?php
namespace AppBundle\Twig;

use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class AppExtension extends \Twig_Extension
{
    protected $doctrine;
    private $requestStack;


    public function __construct(RegistryInterface $doctrine,RequestStack $requestStack)
    {
        $this->doctrine = $doctrine;
        $this->requestStack = $requestStack;
    }

    public function getFunctions()
    {
        return array(
            'GetxProduits' => new \Twig_SimpleFunction('GetxProduits', function ($ar,$athis) {
                $requestStack = $this->requestStack;
                $findproduits = $this->doctrine->getRepository('WebAdminBundle:Produit')->findByCategorie($ar);
                $page = $requestStack->getCurrentRequest()->query->get('p', 1);
                $produits  = $athis->get('knp_paginator')->paginate($findproduits,$page , $limit = 9);
                return $produits;
            }),
            'GetPartenaires' => new \Twig_SimpleFunction('GetPartenaires', function () {
                $partenaires = $this->doctrine->getRepository('WebAdminBundle:Partenaires')->findAll();
                return $partenaires;
            }),
            'GetSocial' => new \Twig_SimpleFunction('GetSocial', function () {
                $social = $this->doctrine->getRepository('WebAdminBundle:Parameter')->findSocial();
                return $social;
            }),
            'GetSiteInfo' => new \Twig_SimpleFunction('GetSiteInfo', function () {
                $social = $this->doctrine->getRepository('WebAdminBundle:Parameter')->findInfo();
                return $social;
            }),'GetFooter' => new \Twig_SimpleFunction('GetFooter', function () {
                $social = $this->doctrine->getRepository('WebAdminBundle:Parameter')->findFooter();
                return $social;
            }),
            'getGlobals' => new \Twig_SimpleFunction('getGlobals', function () {
                $requestStack = $this->requestStack;
                $session = $requestStack->getCurrentRequest()->getSession();
                if(!$session->has('panier'))  $session->set('panier',array());
                $panier = $session->get('panier');
                return array(
                    'NbrPan' =>count($panier),
                );
            }),'getLast' => new \Twig_SimpleFunction('getLast', function () {
                $produit = $this->doctrine->getRepository('WebAdminBundle:Produit')->findlast();
                return $produit;
            }),
            'countNonLu' => new \Twig_SimpleFunction('countNonLu', function () {
                $cnl = $this->doctrine->getRepository('WebAdminBundle:Formu')->countNonLu();
                return $cnl;
            }),
        );
    }

    public function getName()
    {
        return 'app_extension';
    }
}