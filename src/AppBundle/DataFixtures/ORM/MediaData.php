<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Web\AdminBundle\Entity\Media;

class MediaData extends AbstractFixture implements OrderedFixtureInterface
{

    private function ajouterImage($manager, $nom, $path)
    {
        $img = new Media();
        $img->setNom($nom);
        $img->setImage($path);
        $manager->persist($img);
        $this->addReference($nom,$img);
    }

    public function load(ObjectManager $manager)
    {

        /* ========= Image Partenaire =========== */

        $this->ajouterImage($manager, "img-air-case","partenaires/aircase.jpg");
        $this->ajouterImage($manager, "img-case","partenaires/case.jpg");
        $this->ajouterImage($manager, "img-deap","partenaires/deap.jpg");
        $this->ajouterImage($manager, "img-soft-step","partenaires/softstep.jpg");
        $this->ajouterImage($manager, "img-iTech","partenaires/itech.jpg");
        $this->ajouterImage($manager, "img-pagani","partenaires/pagani.jpg");


        /* ========= page =========== */

        $this->ajouterImage($manager, "img-presentation","pages/i1.jpg");
        $this->ajouterImage($manager, "img-contact","pages/contact_white.png");

        /* ========= Produit =========== */

        $this->ajouterImage($manager, "infrared-whf-312","equipement-cabinet/cabinet-kine/appareil-portatif/lampe-infra-rouge/infrared-whf-312.jpg");

        $this->ajouterImage($manager, "Smart-Tens","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/Smart-Tens.jpg");
        $this->ajouterImage($manager, "kit-Smart-Tens","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/Kit-Smart-Tens.jpg");

        $this->ajouterImage($manager, "mio-care-tens-1","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/mio-care-tens-1.jpg");
        $this->ajouterImage($manager, "mio-care-tens-3","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/mio-care-tens-3.jpg");
        $this->ajouterImage($manager, "mio-care-tens-4","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/mio-care-tens-4.jpg");
        $this->ajouterImage($manager, "mio-care-tens-5","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/mio-care-tens-5.jpg");

        $this->ajouterImage($manager, "MioCareBeauty","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/MioCareBeauty.jpg");
        $this->ajouterImage($manager, "kit_Beauty","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/kit_Beauty.jpg");
        $this->ajouterImage($manager, "mio-care-tens-7","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/mio-care-tens-7.jpg");
        $this->ajouterImage($manager, "mio-care-tens-8","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/mio-care-tens-8.jpg");

        $this->ajouterImage($manager, "MioCare-Fitness-1","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/MioCare-Fitness-1.jpg");
        $this->ajouterImage($manager, "Kit-Fitness-2","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/Kit-Fitness-2.jpg");
        $this->ajouterImage($manager, "mio-care-tens-2","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/mio-care-tens-2.jpg");
        $this->ajouterImage($manager, "mio-care-tens-9","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/mio-care-tens-9.jpg");

        $this->ajouterImage($manager, "mio-care-tens-6","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/mio-care-tens-6.jpg");

        $this->ajouterImage($manager, "p-mio-care-pro","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/p-mio-care-pro.jpg");
        $this->ajouterImage($manager, "p-mio-care-pro-2","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/p-mio-care-pro-2.jpg");

        $this->ajouterImage($manager, "MioVein","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/MioVein.jpg");
        $this->ajouterImage($manager, "Kit_Mio-Vein","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/Kit_Mio-Vein.jpg");

        $this->ajouterImage($manager, "mioIonotens","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/mioIonotens.jpg");
        $this->ajouterImage($manager, "mioIonotensb","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/mioIonotensb.jpg");
        $this->ajouterImage($manager, "Mio-Ionotens-d","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/Mio-Ionotens-d.jpg");

        $this->ajouterImage($manager, "Mio-Peristim","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/Mio-Peristim.jpg");
        $this->ajouterImage($manager, "Mio-Peristim-b","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/Mio-Peristim-b.jpg");

        $this->ajouterImage($manager, "p-itech-physio","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/p-itech-physio.jpg");
        $this->ajouterImage($manager, "p-itech-physio-2","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/p-itech-physio-2.jpg");

        $this->ajouterImage($manager, "T-One-Evo-I","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/T-One-Evo-I.jpg");
        $this->ajouterImage($manager, "T-One-Evo-I-box","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/T-One-Evo-I-box.jpg");

        $this->ajouterImage($manager, "T-One-Evo-II","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/T-One-Evo-II.jpg");
        $this->ajouterImage($manager, "T-One-Evo-II-box","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/T-One-Evo-II-box.jpg");
        $this->ajouterImage($manager, "t-one-b","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/t-one-b.jpg");
        $this->ajouterImage($manager, "T-One-Evo-II-d","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/T-One-Evo-II-d.jpg");

        $this->ajouterImage($manager, "T-One-Medi","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/T-One-Medi.jpg");
        $this->ajouterImage($manager, "T-One-Medi-Box","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/T-One-Medi-Box.jpg");
        $this->ajouterImage($manager, "T-One-Medi-d","equipement-cabinet/cabinet-kine/appareil-portatif/electrotherapie/T-One-Medi-d.jpg");

        $this->ajouterImage($manager, "sonicstim1","equipement-cabinet/cabinet-kine/appareil-portatif/ultrason/sonicstim1.jpg");
        $this->ajouterImage($manager, "sonicstim3","equipement-cabinet/cabinet-kine/appareil-portatif/ultrason/sonicstim3.jpg");
        $this->ajouterImage($manager, "sonicstim5","equipement-cabinet/cabinet-kine/appareil-portatif/ultrason/sonicstim5.jpg");

        $this->ajouterImage($manager, "miosonic","equipement-cabinet/cabinet-kine/appareil-portatif/ultrason/miosonic.jpg");
        $this->ajouterImage($manager, "miosonic-2","equipement-cabinet/cabinet-kine/appareil-portatif/ultrason/miosonic-2.jpg");
        $this->ajouterImage($manager, "miosonic-3","equipement-cabinet/cabinet-kine/appareil-portatif/ultrason/miosonic-3.jpg");

        $this->ajouterImage($manager, "p-itech-phys","equipement-cabinet/cabinet-kine/appareil-professionel/electrotherapie/p-itech-physio.jpg");
        $this->ajouterImage($manager, "p-itech-phys-2","equipement-cabinet/cabinet-kine/appareil-professionel/electrotherapie/p-itech-physio-2.jpg");
        $this->ajouterImage($manager, "T-One-Medi-Pro","equipement-cabinet/cabinet-kine/appareil-professionel/electrotherapie/T-One-Medi-Pro.jpg");
        $this->ajouterImage($manager, "T-One-Medi-Pro-Box","equipement-cabinet/cabinet-kine/appareil-professionel/electrotherapie/T-One-Medi-Pro-Box.jpg");
        $this->ajouterImage($manager, "T-One-Medi-Pro-d","equipement-cabinet/cabinet-kine/appareil-professionel/electrotherapie/T-One-Medi-Pro-d.jpg");

        $this->ajouterImage($manager, "T-One-physio","equipement-cabinet/cabinet-kine/appareil-professionel/electrotherapie/T-One-physio.jpg");
        $this->ajouterImage($manager, "T-One-physio-box","equipement-cabinet/cabinet-kine/appareil-professionel/electrotherapie/T-One-physio-box.jpg");

        $this->ajouterImage($manager, "q6000plus","equipement-cabinet/cabinet-kine/appareil-professionel/pressotherapie/q6000plus.jpg");
        $this->ajouterImage($manager, "q6000plus-2en","equipement-cabinet/cabinet-kine/appareil-professionel/pressotherapie/q6000plus-2en.jpg");

        $this->ajouterImage($manager, "POWER-Q1000_Premium","equipement-cabinet/cabinet-kine/appareil-professionel/pressotherapie/POWER-Q1000_Premium.jpg");

        $this->ajouterImage($manager, "I-TECH-UE_arm_LOW","equipement-cabinet/cabinet-kine/appareil-professionel/ultrason/I-TECH-UE_arm_LOW.jpg");

        $this->ajouterImage($manager, "I-TECH-UT1_carr_LOW","equipement-cabinet/cabinet-kine/appareil-professionel/ultrason/I-TECH-UT1_carr_LOW.jpg");

        $this->ajouterImage($manager, "I-TECH-UT2_arm_LOW","equipement-cabinet/cabinet-kine/appareil-professionel/ultrason/I-TECH-UT2_arm_LOW.jpg");

        $this->ajouterImage($manager, "table", "equipement-cabinet/cabinet-kine/equipement/table/table.jpg");


        /* ========== Cabinet Réalisé ========== */
        $this->ajouterImage($manager,"kine1","cabinet-realise/kine1.jpg");
        $this->ajouterImage($manager,"kine2","cabinet-realise/kine2.jpg");
        $this->ajouterImage($manager,"kine3","cabinet-realise/kine3.jpg");
        $this->ajouterImage($manager,"kine4","cabinet-realise/kine4.jpg");
        $this->ajouterImage($manager,"medical","cabinet-realise/medical.jpg");

        /* ========== Images Accessoires ========== */
        $this->ajouterImage($manager, "a0804","accessoires/a0804.jpg");
        $this->ajouterImage($manager, "ab01","accessoires/ab01.jpg");
        $this->ajouterImage($manager, "ab04","accessoires/ab04.jpg");
        $this->ajouterImage($manager, "ab05b","accessoires/ab05b.jpg");
        $this->ajouterImage($manager, "ab05","accessoires/ab05.jpg");
        $this->ajouterImage($manager, "ab13","accessoires/ab13.jpg");
        $this->ajouterImage($manager, "ab14","accessoires/ab14.jpg");
        $this->ajouterImage($manager, "dnb406","accessoires/dnb406.jpg");
        $this->ajouterImage($manager, "dnb437","accessoires/dnb437.jpg");
        $this->ajouterImage($manager, "dnb441","accessoires/dnb441.jpg");
        $this->ajouterImage($manager, "hb5010","accessoires/hb5010.jpg");
        $this->ajouterImage($manager, "hb5020","accessoires/hb5020.jpg");
        $this->ajouterImage($manager, "hb5051","accessoires/hb5051.jpg");
        $this->ajouterImage($manager, "hb5104","accessoires/hb5104.jpg");
        $this->ajouterImage($manager, "hb5105","accessoires/hb5105.jpg");
        $this->ajouterImage($manager, "hb5110","accessoires/hb5110.jpg");
        $this->ajouterImage($manager, "hb5117","accessoires/hb5117.jpg");
        $this->ajouterImage($manager, "hb5201","accessoires/hb5201.jpg");
        $this->ajouterImage($manager, "hb5204","accessoires/hb5204.jpg");
        $this->ajouterImage($manager, "hb5234","accessoires/hb5234.jpg");
        $this->ajouterImage($manager, "hb5240","accessoires/hb5240.jpg");
        $this->ajouterImage($manager, "hb5243","accessoires/hb5243.jpg");
        $this->ajouterImage($manager, "hb5244","accessoires/hb5244.jpg");
        $this->ajouterImage($manager, "hb5245","accessoires/hb5245.jpg");
        $this->ajouterImage($manager, "hb5246","accessoires/hb5246.jpg");
        $this->ajouterImage($manager, "hb5247","accessoires/hb5247.jpg");
        $this->ajouterImage($manager, "hb5248","accessoires/hb5248.jpg");
        $this->ajouterImage($manager, "hb5250","accessoires/hb5250.jpg");
        $this->ajouterImage($manager, "hb5264","accessoires/hb5264.jpg");
        $this->ajouterImage($manager, "hb5265","accessoires/hb5265.jpg");
        $this->ajouterImage($manager, "hb5266","accessoires/hb5266.jpg");
        $this->ajouterImage($manager, "hb5270","accessoires/hb5270.jpg");
        $this->ajouterImage($manager, "hb5285","accessoires/hb5285.jpg");
        $this->ajouterImage($manager, "hb5303","accessoires/hb5303.jpg");
        $this->ajouterImage($manager, "hb5305","accessoires/hb5305.jpg");
        $this->ajouterImage($manager, "hb5403","accessoires/hb5403.jpg");
        $this->ajouterImage($manager, "hb5407a","accessoires/hb5407a.jpg");
        $this->ajouterImage($manager, "hb5407b","accessoires/hb5407b.jpg");
        $this->ajouterImage($manager, "hb5409","accessoires/hb5409.jpg");
        $this->ajouterImage($manager, "hb5410","accessoires/hb5410.jpg");
        $this->ajouterImage($manager, "hb5411","accessoires/hb5411.jpg");
        $this->ajouterImage($manager, "hb6010","accessoires/hb6010.jpg");
        $this->ajouterImage($manager, "hb7001","accessoires/hb7001.jpg");
        $this->ajouterImage($manager, "hb7002","accessoires/hb7002.jpg");
        $this->ajouterImage($manager, "hb7003","accessoires/hb7003.jpg");
        $this->ajouterImage($manager, "hb7005","accessoires/hb7005.jpg");
        $this->ajouterImage($manager, "hb7006","accessoires/hb7006.jpg");
        $this->ajouterImage($manager, "hb7007","accessoires/hb7007.jpg");
        $this->ajouterImage($manager, "hb7010","accessoires/hb7010.jpg");
        $this->ajouterImage($manager, "hb7101","accessoires/hb7101.jpg");
        $this->ajouterImage($manager, "hb7102","accessoires/hb7102.jpg");
        $this->ajouterImage($manager, "hb7104","accessoires/hb7104.jpg");
        $this->ajouterImage($manager, "hb7105","accessoires/hb7105.jpg");
        $this->ajouterImage($manager, "hb7106","accessoires/hb7106.jpg");
        $this->ajouterImage($manager, "hb7107","accessoires/hb7107.jpg");
        $this->ajouterImage($manager, "hb7108","accessoires/hb7108.jpg");
        $this->ajouterImage($manager, "hb7110","accessoires/hb7110.jpg");
        $this->ajouterImage($manager, "hb7111","accessoires/hb7111.jpg");
        $this->ajouterImage($manager, "hb7112","accessoires/hb7112.jpg");
        $this->ajouterImage($manager, "hb7113","accessoires/hb7113.jpg");
        $this->ajouterImage($manager, "hb7116","accessoires/hb7116.jpg");
        $this->ajouterImage($manager, "hb7125","accessoires/hb7125.jpg");
        $this->ajouterImage($manager, "hb7202","accessoires/hb7202.jpg");
        $this->ajouterImage($manager, "hb7270b","accessoires/hb7270b.jpg");
        $this->ajouterImage($manager, "hb7270a","accessoires/hb7270a.jpg");
        $this->ajouterImage($manager, "hb7303","accessoires/hb7303.jpg");
        $this->ajouterImage($manager, "hb7304","accessoires/hb7304.jpg");
        $this->ajouterImage($manager, "hb7305","accessoires/hb7305.jpg");
        $this->ajouterImage($manager, "hb7306","accessoires/hb7306.jpg");
        $this->ajouterImage($manager, "hb7307","accessoires/hb7307.jpg");
        $this->ajouterImage($manager, "hb7310","accessoires/hb7310.jpg");
        $this->ajouterImage($manager, "hb7311","accessoires/hb7311.jpg");
        $this->ajouterImage($manager, "hb7312","accessoires/hb7312.jpg");
        $this->ajouterImage($manager, "hb7313","accessoires/hb7313.jpg");
        $this->ajouterImage($manager, "hb7321","accessoires/hb7321.jpg");
        $this->ajouterImage($manager, "hb7322","accessoires/hb7322.jpg");
        $this->ajouterImage($manager, "hb7325","accessoires/hb7325.jpg");
        $this->ajouterImage($manager, "hb7330","accessoires/hb7330.jpg");
        $this->ajouterImage($manager, "hb7331","accessoires/hb7331.jpg");
        $this->ajouterImage($manager, "hb7402","accessoires/hb7402.jpg");
        $this->ajouterImage($manager, "kb301","accessoires/kb301.jpg");
        $this->ajouterImage($manager, "kb302","accessoires/kb302.jpg");
        $this->ajouterImage($manager, "kb303","accessoires/kb303.jpg");
        $this->ajouterImage($manager, "kb314","accessoires/kb314.jpg");
        $this->ajouterImage($manager, "kb534","accessoires/kb534.jpg");
        $this->ajouterImage($manager, "kb535","accessoires/kb535.jpg");
        $this->ajouterImage($manager, "kb714","accessoires/kb714.jpg");
        $this->ajouterImage($manager, "ms400100","accessoires/ms400100.jpg");
        $this->ajouterImage($manager, "ms400200","accessoires/ms400200.jpg");
        $this->ajouterImage($manager, "ms400300","accessoires/ms400300.jpg");
        $this->ajouterImage($manager, "ms500","accessoires/ms500.jpg");
        $this->ajouterImage($manager, "ms600","accessoires/ms600.jpg");
        $this->ajouterImage($manager, "ns01","accessoires/ns01.jpg");
        $this->ajouterImage($manager, "ns02","accessoires/ns02.jpg");
        $this->ajouterImage($manager, "ns03","accessoires/ns03.jpg");
        $this->ajouterImage($manager, "ns04","accessoires/ns04.jpg");
        $this->ajouterImage($manager, "ns05","accessoires/ns05.jpg");
        $this->ajouterImage($manager, "sc1001","accessoires/sc1001.jpg");
        $this->ajouterImage($manager, "sc1002","accessoires/sc1002.jpg");
        $this->ajouterImage($manager, "ss002","accessoires/ss002.jpg");
        $this->ajouterImage($manager, "ss003","accessoires/ss003.jpg");
        $this->ajouterImage($manager, "ss004","accessoires/ss004.jpg");
        $this->ajouterImage($manager, "ss005","accessoires/ss005.jpg");
        $this->ajouterImage($manager, "ss006a","accessoires/ss006a.jpg");
        $this->ajouterImage($manager, "ss006","accessoires/ss006.jpg");
        $this->ajouterImage($manager, "ss007","accessoires/ss007.jpg");
        $this->ajouterImage($manager, "vp1001","accessoires/vp1001.jpg");
        $this->ajouterImage($manager, "vp1003","accessoires/vp1003.jpg");
        $this->ajouterImage($manager, "vp1004","accessoires/vp1004.jpg");
        $this->ajouterImage($manager, "vt1002","accessoires/vt1002.jpg");
        $this->ajouterImage($manager, "wk01","accessoires/wk01.jpg");
        $this->ajouterImage($manager, "msms1","accessoires/msms1.jpg");
        $this->ajouterImage($manager, "msms2","accessoires/msms2.jpg");
        $this->ajouterImage($manager, "msms3","accessoires/msms3.jpg");


        /* ========== Sabot ========== */
        $this->ajouterImage($manager,'sabot01','sabot/orthopedique/sabot1/01.jpg');
        $this->ajouterImage($manager,'sabot02','sabot/orthopedique/sabot1/02.jpg');
        $this->ajouterImage($manager,'sabot03','sabot/orthopedique/sabot2/03.jpg');
        $this->ajouterImage($manager,'sabot04','sabot/orthopedique/sabot2/04.jpg');
        $this->ajouterImage($manager,'sabot05','sabot/orthopedique/sabot3/05.jpg');
        $this->ajouterImage($manager,'sabot06','sabot/orthopedique/sabot3/06.jpg');
        $this->ajouterImage($manager,'sabot07','sabot/orthopedique/sabot4/07.jpg');
        $this->ajouterImage($manager,'sabot08','sabot/orthopedique/sabot4/08.jpg');
        $this->ajouterImage($manager,'sabot09','sabot/orthopedique/sabot5/09.jpg');
        $this->ajouterImage($manager,'sabot10','sabot/orthopedique/sabot5/10.jpg');
        $this->ajouterImage($manager,'sabot11','sabot/chaussures/11.jpg');
        $this->ajouterImage($manager,'sabot12','sabot/chaussures/12.jpg');
        $this->ajouterImage($manager,'sabot13','sabot/bloc/13.jpg');
        $this->ajouterImage($manager,'sabot14','sabot/bloc/14.jpg');
        $this->ajouterImage($manager,'sabot15','sabot/bloc/15.jpg');
        $this->ajouterImage($manager,'sabot16','sabot/bloc/16.jpg');

        /* ========== AIde à la marche ========== */
       $this->ajouterImage($manager,'canne01','aide-marche/canne/01.jpg');
        $this->ajouterImage($manager,'canne02','aide-marche/canne/02.jpg');
        $this->ajouterImage($manager,'canne03','aide-marche/canne/03.jpg');
        $this->ajouterImage($manager,'canne04','aide-marche/canne/04.jpg');
        $this->ajouterImage($manager,'canne05','aide-marche/canne/05.jpg');
        $this->ajouterImage($manager,'canne06','aide-marche/canne/06.jpg');
        $this->ajouterImage($manager,'canne07','aide-marche/canne/07.jpg');
        $this->ajouterImage($manager,'canne08','aide-marche/canne/08.jpg');
        $this->ajouterImage($manager,'canne09','aide-marche/canne/09.jpg');
        $this->ajouterImage($manager,'canne10','aide-marche/canne/10.jpg');
        $this->ajouterImage($manager,'canne11','aide-marche/canne/11.jpg');
        $this->ajouterImage($manager,'canne12','aide-marche/canne/12.jpg');


        $this->ajouterImage($manager, 'fauteil01','aide-marche/fauteil/01.jpg');
        $this->ajouterImage($manager, 'fauteil02','aide-marche/fauteil/02.jpg');
        $this->ajouterImage($manager, 'fauteil03','aide-marche/fauteil/03.jpg');
        $this->ajouterImage($manager, 'fauteil04','aide-marche/fauteil/04.jpg');
        $this->ajouterImage($manager, 'fauteil05','aide-marche/fauteil/05.jpg');
        $this->ajouterImage($manager, 'fauteil06','aide-marche/fauteil/06.jpg');
        $this->ajouterImage($manager, 'fauteil07','aide-marche/fauteil/07.jpg');
        $this->ajouterImage($manager, 'fauteil08','aide-marche/fauteil/08.jpg');
        $this->ajouterImage($manager, 'fauteil09','aide-marche/fauteil/09.jpg');
        $this->ajouterImage($manager, 'fauteil10','aide-marche/fauteil/10.jpg');
        $this->ajouterImage($manager, 'fauteil11','aide-marche/fauteil/11.jpg');
        $this->ajouterImage($manager, 'fauteil12','aide-marche/fauteil/12.jpg');
        $this->ajouterImage($manager, 'fauteil13','aide-marche/fauteil/13.jpg');
        $this->ajouterImage($manager, 'fauteil14','aide-marche/fauteil/14.jpg');


        $this->ajouterImage($manager, 'lit01','aide-marche/lit/lit-electrique/lit01.jpg');
        $this->ajouterImage($manager, 'lit02','aide-marche/lit/lit-electrique/lit02.jpg');
        $this->ajouterImage($manager, 'lit03','aide-marche/lit/lit-epoxy/lit03.png');
        $this->ajouterImage($manager, 'lit04','aide-marche/lit/lit-inox/lit04.png');

        $manager->flush();

    }

    public function getOrder(){
        return 1;
    }

}
