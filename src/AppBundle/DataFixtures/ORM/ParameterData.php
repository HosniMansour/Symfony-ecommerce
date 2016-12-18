<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Web\AdminBundle\Entity\Parameter;

class ParameterData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $param = new Parameter();
        $param->setId(1);
        $param->setNomSite('Medor');
        $param->setEmailNoti('Contact@medor.tn');
        $param->setDescSite("Medor est une société spécialisée dans la vente et la distribution des dispositifs médicaux à usage unique, de matériels orthopédiques, équipements cliniques et hôpitaux.");
        $param->setKeyWordSite("Vente materiel medical, kiné , orthépedique,sabot ,lit medical, canne,cabinet medical ,monastir");
        // Social
        $param->setSocialNetwork("<ul> <li><a target=\"_blank\" href=\"https://www.facebook.com/Medor--312350562158703/\"><i class=\"fa fa-facebook-square\"></i></a></li> <li><a target=\"_blank\" href=\"#\"><i class=\"fa fa-twitter-square\"></i></a></li> <li><a target=\"_blank\" href=\"#\"><i class=\"fa fa-google-plus-square\"></i></a></li> </ul>");
        //Footer
        $param->setFtrImpl("<a href=\"#\"><img src='/img/geogr.jpg' /></a>");
        $param->setFtrAdr("<p>Avenue Habib Bourguiba</p>
				<p>Rte de Jemmel Monastir 5000-TUNISIE,</p>
				<p>Tél.Fax : (+216) 73 468 040 / 73 465 282</p>
				<p>GSM : (+216) 73 465 282</p>");
        $param->setFtrIntro("<p>Société Medor médical :</p>
			<p>Importatrice d'une gamme orthopédique \"CASE\"</p>
			<p>Importatrice des aides techniques</p>
			<p>Importatrice des matériels kiné ...</p>");
        $manager->persist($param);
        $manager->flush();
    }

public function getOrder(){
    return 6;
}

}