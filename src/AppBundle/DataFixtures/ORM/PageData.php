<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Web\AdminBundle\Entity\Page;

class PageData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $page1 = new Page();
        $page1->setNom("Présentation");
        $page1->setLien("presentation");
        $page1->setContenu("Notre société est importatrice spécialisée dans la vente et la distribution dispositifs médicaux à usage unique, de matériels orthopédiques, équipements cliniques et hôpitaux. Nos compétences médicales et notre bonne connaissance des besoins dans le présent secteur nous permettent de proposer des produits d’un excellent rapport qualité-prix. Notre souci d’assurer le meilleur service avec un prix très compétitif est un point essentiel de notre stratégie.");
        $page1->setImage($this->getReference('img-presentation'));
        $manager->persist($page1);

        $page2 = new Page();
        $page2->setNom("Contact");
        $page2->setLien("contact");
        $page2->setContenu(" <h4>Addresse :</h4> <p>Route De Kairouan Monastir Immeuble Ruspina</p> <p>Monastir 5000-TUNISIE,</p> <p>Tél.Fax : (+216) 73 449 231 GSM : 99 000 631 - 98 742 201</p> <a href='mailto:example@email.com'>medor-compta@hotmail.com</a> <hr> <p>Avenue Habib Bourguiba</p> <p>Rte de Jemmel Monastir 5000-TUNISIE,</p> <p>Tél.Fax : (+216) 73 468 040 GSM : (+216) 73 465 282</p> <p>FAX : 73 465 282</p> <a href='mailto:example@email.com'>medormedicalplus@outlook.com</a> <hr> <p>Avenue de la République</p> <p>Hammam Lif -TUNISIE,</p> <p>GSM : (+216) 95 983 970 - (+216) 96 811 402</p> <a href='mailto:example@email.com'>medor.hammam.lif@hotmail.com</a>");
        $page2->setImage($this->getReference('img-contact'));
        $manager->persist($page2);

        $manager->flush();
    }

    public function getOrder(){
        return 5;
    }

}