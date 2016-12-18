<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Web\AdminBundle\Entity\Categorie;

class CategorieData extends AbstractFixture implements OrderedFixtureInterface
{
    
    private function ajouterCategorie($manager, $nom, $refMere, $i)
    {
        $cat = new Categorie();
        $cat->setNom($nom);
        $cat->setMere($this->getReference($refMere));
        $manager->persist($cat);
        $this->addReference('cat'.$i.'-'.$cat->getRef(), $cat);
    }
    
    public function load(ObjectManager $manager)
    {
        /* Medor */
        $medor = new Categorie();
        $medor->setNom("Medor");
        $manager->persist($medor);
        $this->addReference('cat1-medor', $medor);


        /* 5 Famille */
        $this->ajouterCategorie($manager,"Equipement Cabinet","cat1-medor",2);
        $this->ajouterCategorie($manager,"Cabinet Realisé","cat1-medor",3);
        $this->ajouterCategorie($manager,"Accessoires Orthopédiques","cat1-medor",4);
        $this->ajouterCategorie($manager,"Aide à la Marche","cat1-medor",5);
        $this->ajouterCategorie($manager,"Sabot Orthopédique","cat1-medor",6);

            /* ---- Equipement Cabinet -----*/
                /* ---- Cabinet Kiné -----*/
                $this->ajouterCategorie($manager,"Cabinet Kiné","cat2-equipement-cabinet",21);
                    /* --------- Appareil Portatif ------ */
                        $this->ajouterCategorie($manager,"Appareil Portatif","cat21-cabinet-kine",211);
                            /* --------- Appareil Portatif cats ------ */
                            $this->ajouterCategorie($manager,"Lampe Infra Rouge","cat211-appareil-portatif",2111);
                            $this->ajouterCategorie($manager,"Électrothérapie","cat211-appareil-portatif",2112);
                            $this->ajouterCategorie($manager,"Ultrason","cat211-appareil-portatif",2113);

                        /* --------- Appareil Professionnel ------ */
                        $this->ajouterCategorie($manager,"Appareil Professionnel","cat21-cabinet-kine",212);
                            /* --------- Appareil Professionnel cats ------ */
                            $this->ajouterCategorie($manager,"Pressothérapie","cat212-appareil-professionnel",2121);
                            $this->ajouterCategorie($manager,"Ultrason pro","cat212-appareil-professionnel",2122);
                            $this->ajouterCategorie($manager,"Electrothérapie pro","cat212-appareil-professionnel",2123);

                        /* --------- Equipement ------ */
                        $this->ajouterCategorie($manager,"Equipement","cat21-cabinet-kine",213);
                               /* --------- Equipement cats ------ */
                            $this->ajouterCategorie($manager,"Table","cat213-equipement",2131);
                            $this->ajouterCategorie($manager,"Cage et Accessoires","cat213-equipement",2132);
                            $this->ajouterCategorie($manager,"Gueridon","cat213-equipement",2133);
                            $this->ajouterCategorie($manager,"Tabouret","cat213-equipement",2134);
                            $this->ajouterCategorie($manager,"Caussin","cat213-equipement",2135);

                /* ---- Cabinet Médecin -----*/
       //         $this->ajouterCategorie($manager,"Cabinet Médecin","cat2-equipement-cabinet",22);
                    /* --------- Cabinet Médecin cats ------ */
        //            $this->ajouterCategorie($manager,"Immobilier","cat22-cabinet-medecin",221);
         //           $this->ajouterCategorie($manager,"Consommable","cat22-cabinet-medecin",222);

        /* ---- End Equipement Cabinet -----*/

        /* ---- Cabinet Realise -----*/

            $this->ajouterCategorie($manager,"Cabinet","cat3-cabinet-realise",31);
                $this->ajouterCategorie($manager,"Cabinet Kiné","cat31-cabinet",311);
                $this->ajouterCategorie($manager,"Cabinet Medical","cat31-cabinet",312);
        /* ---- End Cabinet Realise -----*/

        /* ---- Accessoires Orthopediques -----*/
            $this->ajouterCategorie($manager,"Accessoires","cat4-accessoires-orthopediques",41);
                $this->ajouterCategorie($manager,"Lombostats","cat41-accessoires",4101);
                $this->ajouterCategorie($manager,"Colliers","cat41-accessoires",4102);
                $this->ajouterCategorie($manager,"Redresse Dos","cat41-accessoires",4103);
                $this->ajouterCategorie($manager,"Oreillers","cat41-accessoires",4104);
                $this->ajouterCategorie($manager,"Epaules","cat41-accessoires",4105);
                $this->ajouterCategorie($manager,"Coudieres","cat41-accessoires",4106);
                $this->ajouterCategorie($manager,"Poignets","cat41-accessoires",4107);
                $this->ajouterCategorie($manager,"Doigts","cat41-accessoires",4108);
                $this->ajouterCategorie($manager,"Genouilleres","cat41-accessoires",4109);
                $this->ajouterCategorie($manager,"Chevilleres","cat41-accessoires",4110);
                $this->ajouterCategorie($manager,"Semelles","cat41-accessoires",4111);
                $this->ajouterCategorie($manager,"Cuissard","cat41-accessoires",4112);
                $this->ajouterCategorie($manager,"Contention élastique","cat41-accessoires",4113);
                $this->ajouterCategorie($manager,"Esthétique","cat41-accessoires",4114);

                ;
        /* ---- End Accessoires Orthopediques -----*/

        /* ---- Aide à la Marche -----*/
            /*$this->ajouterCategorie($manager,"Canne","cat5-aide-a-la-marche",51);
                $this->ajouterCategorie($manager,"Canne Canadienne","cat51-canne",511);
                $this->ajouterCategorie($manager,"Canne en C","cat51-canne",512);
                $this->ajouterCategorie($manager,"Canne en T","cat51-canne",513);

            $this->ajouterCategorie($manager,"Chaise Garde robe","cat5-aide-a-la-marche",52);
                $this->ajouterCategorie($manager,"Chaise Garde Robe","cat52-chaise-garde-robe",521);
                $this->ajouterCategorie($manager,"Chaise Toilette Fixe","cat52-chaise-garde-robe",522);

            $this->ajouterCategorie($manager,"Fauteil","cat5-aide-a-la-marche",53);
                $this->ajouterCategorie($manager,"Fauteil Standard","cat53-fauteil",531);
                $this->ajouterCategorie($manager,"Fauteuil Confort","cat53-fauteil",532);*/
        $this->ajouterCategorie($manager,"Aide À La Marche","cat5-aide-a-la-marche",51);
            $this->ajouterCategorie($manager,"Canne","cat51-aide-a-la-marche",511);
            $this->ajouterCategorie($manager,"Deambulateur","cat51-aide-a-la-marche",512);
	        $this->ajouterCategorie($manager,"Fauteil roulant", "cat51-aide-a-la-marche",513);
	        $this->ajouterCategorie($manager,"Lit Médical", "cat51-aide-a-la-marche",514);


        /* ---- End Aide à la Marche -----*/

        /* ---- Sabot -----*/
        $this->ajouterCategorie($manager,"Sabot homme femme","cat6-sabot-orthopedique",61);
            //$this->ajouterCategorie($manager,"Sabot Homme","cat6-sabot-orthopedique",61);
                $this->ajouterCategorie($manager,"Sabot orthopédique","cat61-sabot-homme-femme",611);
                $this->ajouterCategorie($manager,"Sabot de Bloc","cat61-sabot-homme-femme",612);
                $this->ajouterCategorie($manager,"Chaussures othopédiques","cat61-sabot-homme-femme",613);
            //$this->ajouterCategorie($manager,"Sabot femme","cat6-sabot-orthopedique",62);
           //     $this->ajouterCategorie($manager,"Sabot orthopédique","cat62-sabot-femme",621);
            //    $this->ajouterCategorie($manager,"Sabot de Bloc","cat62-sabot-femme",622);
            //    $this->ajouterCategorie($manager,"Chaussures othopédique","cat62-sabot-femme",623);

        $manager->flush();
        $categories = $manager->getRepository('WebAdminBundle:Categorie')->findAll();
        foreach($categories as $elem){
            $elem->creerLien();
            $manager->persist($elem);
        }
        $manager->flush();

    }

    public function getOrder(){
        return 3;
    }

}
