<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Web\AdminBundle\Entity\Produit;

class ProduitData extends AbstractFixture implements OrderedFixtureInterface
{

    private function creerProduit($nbr,$prix,$manager, $nom, $refCateg, $desc, $code, $img)
    {
        $p = new Produit();
        $p->setNom($nom);
        $p->setCategorie($this->getReference($refCateg));
        $p->setNbrstock($nbr);
        $p->setPrix($prix);
        $p->setDescription($desc);
        $p->setCode($code);
        foreach($img as $r)
            $p->addPhoto($this->getReference($r));
        $manager->persist($p);
    }

    public function load(ObjectManager $manager)
    {

        /* ========= Produit Accessoires Orthopediques =========== */

        /* ========= Equipement cabinet========== */
        $this->creerProduit(100,55,$manager, 'Infrared WHF-312 Lampe Infrarouge', 'cat2111-lampe-infra-rouge',Description::$lampeInfraRouge, 'Infrared WHF-312', array('infrared-whf-312'));

        $this->creerProduit(100,40,$manager, 'SMART TENS', 'cat2112-electrotherapie',Description::$smartTens, 'SK124-00', array('Smart-Tens','kit-Smart-Tens'));
        $this->creerProduit(100,42,$manager, 'MIO-CARE TENS', 'cat2112-electrotherapie',Description::$mioCareTens, 'SK211-00', array('mio-care-tens-1', 'mio-care-tens-3', 'mio-care-tens-4', 'mio-care-tens-5'));
        $this->creerProduit(100,40,$manager, 'MIO-CARE BEAUTY', 'cat2112-electrotherapie',Description::$mioCareBeauty, 'SK229-00', array('MioCareBeauty', 'kit_Beauty', 'mio-care-tens-7', 'mio-care-tens-8'));
        $this->creerProduit(100,35,$manager, 'MIO-CARE FITNESS', 'cat2112-electrotherapie',Description::$mioCareFitness, 'SK213-00', array('MioCare-Fitness-1', 'Kit-Fitness-2', 'mio-care-tens-2', 'mio-care-tens-9'));

        $this->creerProduit(100,35,$manager, 'MIO VEIN', 'cat2112-electrotherapie',Description::$mioVein, 'SK165-01', array('MioVein', 'Kit_Mio-Vein'));
        $this->creerProduit(100,40,$manager, 'MIO-IONOTENS', 'cat2112-electrotherapie',Description::$mioIonoTens, 'SK295-00', array('mioIonotens', 'mioIonotensb', 'Mio-Ionotens-d'));
        $this->creerProduit(100,50,$manager, 'MIO-PERISTIM', 'cat2112-electrotherapie',Description::$mioPeristim, 'SK281-00', array('Mio-Peristim', 'Mio-Peristim-b'));
        $this->creerProduit(100,50,$manager, 'I-TECH PHYSIO', 'cat2112-electrotherapie',Description::$itechPhyisio, 'SK280-00', array('p-itech-physio', 'p-itech-physio-2'));
        $this->creerProduit(100,40,$manager, 'T-ONE EVO I', 'cat2112-electrotherapie',Description::$tOneEvoI, 'SK98-00', array('T-One-Evo-I', 'T-One-Evo-I-box'));
        $this->creerProduit(100,45,$manager, 'T-ONE EVO II', 'cat2112-electrotherapie',Description::$tOneEvoII, 'SK90-00', array('T-One-Evo-II', 'T-One-Evo-II-box', 't-one-b', 'T-One-Evo-II-d'));
        $this->creerProduit(100,40,$manager, 'T-ONE MEDI', 'cat2112-electrotherapie',Description::$tOneMedi, 'SK84-00', array('T-One-Medi', 'T-One-Medi-Box', 'T-One-Medi-d'));

        $this->creerProduit(100,35,$manager, 'SONICSTIM', 'cat2113-ultrason',Description::$sonocSTIM, 'SK88-00', array('sonicstim1', 'sonicstim3', 'sonicstim5'));
        $this->creerProduit(100,30,$manager, 'MIO SONIC', 'cat2113-ultrason',Description::$mioSonic, 'SK135-02', array('miosonic', 'miosonic-2', 'miosonic-3'));

        $this->creerProduit(100,70,$manager, 'I-TECH PHYSIO',  'cat2123-electrotherapie-pro',Description::$itechPhyisio, 'SK280-00', array('p-itech-phys', 'p-itech-phys-2'));
        $this->creerProduit(100,60,$manager, 'T-ONE MEDI PRO', 'cat2123-electrotherapie-pro',Description::$tOneMediPro, 'SK85-00', array('T-One-Medi-Pro', 'T-One-Medi-Pro-Box', 'T-One-Medi-Pro-d'));
        $this->creerProduit(100,60,$manager, 'T-ONE PHYSIO',   'cat2123-electrotherapie-pro',Description::$tOnePhysio, 'SK94-00', array('T-One-physio', 'T-One-physio-box'));
        $this->creerProduit(100,70,$manager, 'MIO CARE PRO',   'cat2123-electrotherapie-pro',Description::$mioCarePro, 'SK279-00', array('p-mio-care-pro', 'p-mio-care-pro-2'));

        $this->creerProduit(100,80,$manager, 'Power Q-6000 PLUS', 'cat2121-pressotherapie',Description::$powerQ6000, 'SK157-01', array('q6000plus', 'q6000plus-2en'));
        $this->creerProduit(100,85,$manager, 'POWER Q-1000 Premium', 'cat2121-pressotherapie',Description::$powerQ1000, 'SK220-00', array('POWER-Q1000_Premium'));

        $this->creerProduit(100,60,$manager, 'I-TECH UE', 'cat2122-ultrason-pro',Description::$itechUE, 'SK256-00', array('I-TECH-UE_arm_LOW'));
        $this->creerProduit(100,50,$manager, 'I-TECH UT1', 'cat2122-ultrason-pro',Description::$itechUT1, 'SK254-00', array('I-TECH-UT1_carr_LOW'));
        $this->creerProduit(100,60,$manager, 'I-TECH UT2', 'cat2122-ultrason-pro',Description::$itechUT2, 'SK255-00', array('I-TECH-UT2_arm_LOW'));


        /* ========== Equipement ========== */
       $this->creerProduit(100,70,$manager, 'Table', 'cat2131-table',Description::$table, 'TB-01', array('table'));

        /* ========= Cabinet Réalisé ========== */
            $this->creerProduit(100,1500,$manager, 'Matériel Cabinet Kiné', 'cat311-cabinet-kine','Tout le matériel nécessaire à l\'entretien de votre cabinet et à la sécurité de vos patients.', 'Cab1', array('kine1','kine2','kine3','kine4'));
            $this->creerProduit(100,1990,$manager, 'Matériel Cabinet Médical', 'cat312-cabinet-medical','Le large panel de matériel de diagnostic proposé (thermomètre, tensiomètre, otoscope, oxymètre, lecteur de glycémie...) permet ainsi aux particuliers comme aux professionnels de s\'équiper en fonction de leurs besoins. Toutes les grandes marques y sont d\'ailleurs représentées, comme Littman, Heine, Spengler, Omron ou Seca. ', 'Cab2', array('medical'));

        /* ========= Accessoires========== */
        $this->creerProduit(100,50,$manager, 'Lombostat Rigide D12', 'cat4101-lombostats','S-M-L-XL-XXL <br><br><center></center>', 'HB-5204', array('hb5204'));
        $this->creerProduit(100,40,$manager, 'Lombostat Aéré semi Rigide', 'cat4101-lombostats','S-M-L-XL-XXL <br><br><center></center>', 'HB-5243', array('hb5243'));
        $this->creerProduit(100,45,$manager, 'Lombostat Rigide Aéré double fermeture', 'cat4101-lombostats','S-M-L-XL-XXL <br><br><center></center>', 'HB-5244', array('hb5244'));
        $this->creerProduit(100,40,$manager, 'Lombostat Rigide D12', 'cat4101-lombostats','S-M-L-XL-XXL <br><br><center></center>', 'HB-5258', array('hb5246'));
        $this->creerProduit(100,50,$manager, 'Lombostat Rigide Aéré Double Fermeture, haute et plaque Séparatrice', 'cat4101-lombostats','S-M-L-XL-XXL <br><br><center></center>', 'HB-5245', array('hb5245'));

        $this->creerProduit(100,50,$manager, 'Lombostat Rigide Haut', 'cat4101-lombostats','S-M-L-XL-XXL <br><br><center></center>', 'HB-5234', array('hb5234'));
        $this->creerProduit(100,40,$manager, 'Support Dorsal pour femme enceinte', 'cat4101-lombostats','S-M-L-XL-XXL <br><br><center></center>', 'HB-7202', array('hb7202'));
        $this->creerProduit(100,60,$manager, 'Corset de Jewett', 'cat4101-lombostats','S-M-L-XL-XXL <br><br><center><iframe style="width:80%" height="465" src="https://www.youtube.com/embed/qbRtzECj93c" frameborder="0" allowfullscreen></iframe></center>', 'HB-5270', array('hb5270'));
        $this->creerProduit(100,50,$manager, 'Gilet Dorso Lombaire D6', 'cat4101-lombostats','S-M-L-XL-XXL <br><br><center><iframe style="width:80%" height="465" src="https://www.youtube.com/embed/DTouLPbAfjc" frameborder="0" allowfullscreen></iframe></center>', 'HB-5248', array('hb5248'));
        $this->creerProduit(100,40,$manager, 'Ceinture Abdominale Aéré', 'cat4101-lombostats','S-M-L-XL-XXL <br><br><center></center>', 'HB-5240', array('hb5240'));

        $this->creerProduit(100,40,$manager, 'Collier en Mousse', 'cat4102-colliers','S-M-L <br><br><center></center>', 'NS-03', array('ns03'));
        $this->creerProduit(100,30,$manager, 'Collier C3 sans appui', 'cat4102-colliers','XS-S-M-L <br><br><center></center>', 'NS-01', array('ns01'));
        $this->creerProduit(100,35,$manager, 'collier C3 avec appui', 'cat4102-colliers','XS-S-M-L <br><br><center></center>', 'NS-04', array('ns04'));
        $this->creerProduit(100,40,$manager, 'Mini-minerve C4-C5', 'cat4102-colliers','XS-S-M-L <br><br><center><iframe style="width:80%" height="465" src="https://www.youtube.com/embed/3eXBiTCabN4" frameborder="0" allowfullscreen></iframe></center>', 'NS-02', array('ns02'));
        $this->creerProduit(100,30,$manager, 'Collier d\'urgence', 'cat4102-colliers',' <br><br><center></center>', 'NS-05', array('ns05'));

        $this->creerProduit(100,20,$manager, 'Redresse Dos', 'cat4103-redresse-dos','S-M-L-XL-XXL <br><br><center></center>', 'HB-5247', array('hb5247'));
        $this->creerProduit(100,30,$manager, 'Blocage Claviculaire', 'cat4103-redresse-dos','Ped/Ad <br><br><center><iframe style="width:80%" height="465" src="https://www.youtube.com/embed/8qDNLGtk81k" frameborder="0" allowfullscreen></iframe></center>', 'HB-5407', array('hb5407a'));
        $this->creerProduit(100,25,$manager, 'Blocage Claviculaire', 'cat4103-redresse-dos','S-M-L-XL-XXL <br><br><center></center>', 'HB-5407', array('hb5407b'));
        $this->creerProduit(100,30,$manager, 'Ceinture Thoracique + Bretelles', 'cat4103-redresse-dos','S-M-L-XL <br><br><center></center>', 'HB-5250', array('hb5250'));
        $this->creerProduit(100,40,$manager, 'Ceinture Thoracique', 'cat4103-redresse-dos','S-M-L-XL <br><br><center></center>', 'HB-7402', array('hb7402'));

        $this->creerProduit(100,30,$manager, 'Oreiller Anatomique en Viscoélastique', 'cat4104-oreillers',' <br><br><center></center>', 'VP-1001', array('vp1001', 'vp1003', 'vp1004'));
        $this->creerProduit(100,35,$manager, 'Coussin anti-escarre trouée', 'cat4104-oreillers',' <br><br><center></center>', 'SC-1001', array('sc1001'));
        $this->creerProduit(100,45,$manager, 'Siège Correcteur', 'cat4104-oreillers',' <br><br><center></center>', 'SC-1002', array('sc1002'));
        $this->creerProduit(100,40,$manager, 'Repose Nuque', 'cat4104-oreillers',' <br><br><center></center>', 'VT-1002', array('vt1002'));
        $this->creerProduit(100,30,$manager, 'Gel Cryothérapie chaud - froid', 'cat4104-oreillers',' <br><br><center></center>', 'AB-04', array('ab04'));

        $this->creerProduit(100,25,$manager, 'Soutien d\'épaule', 'cat4105-epaules','S-M-L-XL-XXL <br><br><center><iframe style="width:80%" height="465" src="https://www.youtube.com/embed/uiDktDi2fPM" frameborder="0" allowfullscreen></iframe></center>', 'HB-5403', array('hb5403'));
        $this->creerProduit(100,30,$manager, 'Blocage d\'épaule', 'cat4105-epaules','S-M-L-XL-XXL <br><br><center><iframe style="width:80%" height="465" src="https://www.youtube.com/embed/0FmBUqYErJ8" frameborder="0" allowfullscreen></iframe></center>', 'HB-5409', array('hb5409'));
        $this->creerProduit(100,40,$manager, 'Echarpe de bras', 'cat4105-epaules','S-M-L-XL-XXL <br><br><center></center>', 'DNB-441', array('dnb441'));
        $this->creerProduit(100,35,$manager, 'Echarpe de bras', 'cat4105-epaules','S-M-L-XL-XXL <br><br><center></center>', 'HB-5410', array('hb5410'));
        $this->creerProduit(100,30,$manager, 'Atelle d\'abduction de l\'épaule 30° et 60°', 'cat4105-epaules','S-M-L-XL-XXL <br><br><center></center>', 'HB-5411', array('hb5411'));

        $this->creerProduit(100,30,$manager, 'Coudière Élastique', 'cat4106-coudieres','S-M-L-XL-XXL <br><br><center></center>', 'KB-534', array('kb534'));
        $this->creerProduit(100,35,$manager, 'Coudière', 'cat4106-coudieres','S-M-L-XL-XXL <br><br><center></center>', 'HB-7305', array('hb7305'));
        $this->creerProduit(100,40,$manager, 'Coudièere Ligamentaire', 'cat4106-coudieres','S-M-L-XL-XXL <br><br><center></center>', 'KB-535', array('kb535'));
        $this->creerProduit(100,35,$manager, 'Coudière Ligamentaire Siliconné', 'cat4106-coudieres','S-M-L-XL-XXL <br><br><center></center>', 'HB-7307', array('hb7307'));

        $this->creerProduit(100,20,$manager, 'Bandage anti Epicondylite', 'cat4106-coudieres','S-M-L-XL-XXL <br><br><center></center>', 'HB-7306', array('hb7306'));

        $this->creerProduit(100,30,$manager, 'Fixateur de coude avec une légère barre alum', 'cat4106-coudieres','S-M-L-XL-XXL <br><br><center></center>', 'HB-7310', array('hb7310'));
        $this->creerProduit(100,35,$manager, 'Orthèse Anti-épicondylite', 'cat4106-coudieres','S-M-L-XL-XXL <br><br><center></center>', 'HB7312', array('hb7312'));
        $this->creerProduit(100,30,$manager, 'Orthèse de Coude avec Réglage', 'cat4106-coudieres','S-M-L-XL-XXL <br><br><center></center>', 'HB7313', array('hb7313'));
        $this->creerProduit(100,25,$manager, 'Coudière + Silicone', 'cat4106-coudieres','Standard <br><br><center></center>', 'HB-5305', array('hb5305'));


        $this->creerProduit(100,30,$manager, 'Attelle de Poignet', 'cat4107-poignets','S-M-L / XL-XXL <br><br><center></center>', 'HB-7321', array('hb7321'));
        $this->creerProduit(100,50,$manager, 'Bande Métacarpienne Standard', 'cat4107-poignets','Standard <br><br><center></center>', 'DNB-437', array('dnb437'));
        $this->creerProduit(100,40,$manager, 'Bande de Poignet', 'cat4107-poignets','S-M-L-XL-XXL <br><br><center></center>', 'HB-7311', array('hb7311'));
        $this->creerProduit(100,60,$manager, 'Attelle de Poignet Palmaire', 'cat4107-poignets','S-M-L-XL-XXL <br><br><center></center>', 'HB-7322', array('hb7322'));
        $this->creerProduit(100,40,$manager, 'Attelle Pouce et Poignet', 'cat4107-poignets','S-M-L-XL-XXL <br><br><center></center>', 'HB-7304', array('hb7304'));

        $this->creerProduit(100,40,$manager, 'Attelle de Poignet (avant bras)', 'cat4107-poignets','S-M-L-XL-XXL <br><br><center></center>', 'HB-7325', array('hb7325'));
        $this->creerProduit(100,35,$manager, 'Attelle de Pouce Rhizarthrose', 'cat4107-poignets','S-M-L-XL-XXL <br><br><center></center>', 'HB-7303', array('hb7303'));
        $this->creerProduit(100,40,$manager, 'Attelle Immobilisatrice Pouce, Poignet, IPP', 'cat4107-poignets','S-M-L-XL-XXL <br><br><center></center>', 'HB-7330', array('hb7330'));
        $this->creerProduit(100,45,$manager, 'Attelle de position de repos', 'cat4107-poignets','S - M <br><br><center></center>', 'AB-14', array('ab14'));
        $this->creerProduit(100,40,$manager, 'Attelle de pouce Standard', 'cat4107-poignets','Standard <br><br><center><iframe style="width:80%" height="465" src="https://www.youtube.com/embed/kxdsCwZbhMc" frameborder="0" allowfullscreen></iframe></center>', 'HB-5303', array('hb5303'));

        $this->creerProduit(100,30,$manager, 'Attelle de Doigt Baseball', 'cat4108-doigts',' <br><br><center></center>', 'A-08-04', array('a0804'));
        $this->creerProduit(100,35,$manager, 'Attelle Immobilisatrice de Doigt', 'cat4108-doigts',' <br><br><center></center>', 'HB-7331', array('hb7331'));


        $this->creerProduit(100,50,$manager, 'Genouillère Élastique', 'cat4109-genouilleres','S-M-L-XL-XXL <br><br><center></center>', 'WK-01', array('wk01'));
        $this->creerProduit(100,60,$manager, 'Genouillère Élastique', 'cat4109-genouilleres','S-M-L-XL-XXL <br><br><center></center>', 'HB-7102', array('hb7102'));
        $this->creerProduit(100,50,$manager, 'Genouillère Élastique Simple', 'cat4109-genouilleres','S-M-L-XL-XXL <br><br><center></center>', 'KB-303', array('kb303'));
        $this->creerProduit(100,55,$manager, 'Genouillère avec guide rotulien', 'cat4109-genouilleres','S-M-L-XL-XXL <br><br><center></center>', 'HB-7104', array('hb7104'));
        $this->creerProduit(100,65,$manager, 'Genouillère avec guide rotulien', 'cat4109-genouilleres','S-M-L-XL-XXL <br><br><center></center>', 'KB-314', array('kb314'));

        $this->creerProduit(100,60,$manager, 'Genouillère Ligamentaire', 'cat4109-genouilleres','Standard <br><br><center><iframe style="width:80%" height="465" src="https://www.youtube.com/embed/wzyITrBTcMY" frameborder="0" allowfullscreen></iframe></center>', 'HB-5110', array('hb5110'));
        $this->creerProduit(100,50,$manager, 'Genouillère Ligamentaire', 'cat4109-genouilleres','S-M-L-XL-XXL <br><br><center></center>', 'KB-714', array('kb714'));
        $this->creerProduit(100,20,$manager, 'Genouillère Rotulienne', 'cat4109-genouilleres','Standard <br><br><center></center>', 'HB-5104', array('hb5104'));
        $this->creerProduit(100,60,$manager, 'Genouillère Latérale Articulée', 'cat4109-genouilleres','S-M-L-XL-XXL <br><br><center></center>', 'HB-7111', array('hb7111'));
        $this->creerProduit(100,30,$manager, 'Genouillère Articulée post opératoire-artroscopique', 'cat4109-genouilleres','S-M-L-XL-XXL <br><br><center></center>', 'HB-7112', array('hb7112'));
        $this->creerProduit(100,35,$manager, 'Genouillère avec fonctionnel renforts latéraux croisés', 'cat4109-genouilleres',' <br><br><center></center>', 'HB-7113', array('hb7113'));

        $this->creerProduit(100,30,$manager, 'Genouillère Rotulienne', 'cat4109-genouilleres','S-M-L-XL-XXL <br><br><center></center>', 'HB-7110', array('hb7110'));
        $this->creerProduit(100,40,$manager, 'Attelle d\'immobilisation du genou Universelle', 'cat4109-genouilleres','55-65 cm <br><br><center><iframe style="width:80%" height="465" src="https://www.youtube.com/embed/Iftu-rGH8JQ" frameborder="0" allowfullscreen></iframe></center>', 'HB-5117', array('hb5117'));
        $this->creerProduit(100,50,$manager, 'Orthèse articulée Cruro peedieuse', 'cat4109-genouilleres','S-M-L-XL-XXL <br><br><center></center>', 'HB-7116', array('hb7116'));
        $this->creerProduit(100,40,$manager, 'Orthèse articulée avec réglage', 'cat4109-genouilleres','S-M-L-XL-XXL <br><br><center></center>', 'HB-7125', array('hb7125'));
        $this->creerProduit(100,30,$manager, 'Bande Osgood', 'cat4109-genouilleres','S-M-L-XL-XXL <br><br><center></center>', 'HB-7106', array('hb7106'));
        $this->creerProduit(100,35,$manager, 'Genouilère pour tendinite rotulienne', 'cat4109-genouilleres','S-M-L-XL-XXL <br><br><center></center>', 'HB-7107', array('hb7107'));

        $this->creerProduit(100,40,$manager, 'Chevillère Élastique', 'cat4110-chevilleres','S-M-L-XL-XXL <br><br><center></center>', 'HB-7001', array('hb7001'));
        $this->creerProduit(100,45,$manager, 'Chevillère Élastique Simple', 'cat4110-chevilleres','S-M-L-XL <br><br><center></center>', 'KB-301', array('kb301'));
        $this->creerProduit(100,30,$manager, 'Chevillère Élastique Siliconnée', 'cat4110-chevilleres','S-M-L-XL <br><br><center></center>', 'KB-302', array('kb302'));
        $this->creerProduit(100,35,$manager, 'Chevillère en huit', 'cat4110-chevilleres','Standard <br><br><center></center>', 'DNB-406', array('dnb406'));
        $this->creerProduit(100,40,$manager, 'Chevillère Ligamentaire', 'cat4110-chevilleres','S-M-L-XL-XXL <br><br><center></center>', 'HB-7003', array('hb7003'));

        $this->creerProduit(100,55,$manager, 'Chevillère avec protection bimalléolaire', 'cat4110-chevilleres','S-M-L-XL-XXL <br><br><center></center>', 'HB-7002', array('hb7002'));
        $this->creerProduit(100,50,$manager, 'Chevillère Stabilisatrice de Cheville à Lacet', 'cat4110-chevilleres','S-M-L-XL-XXL <br><br><center></center>', 'HB-7005', array('hb7005'));
        $this->creerProduit(100,40,$manager, 'Chevillère Stabilisatrice avec renforts Latéraux', 'cat4110-chevilleres','S-M-L-XL-XXL <br><br><center></center>', 'HB-7006', array('hb7006'));
        $this->creerProduit(100,35,$manager, 'Chevillère pour tendodn d\'achille', 'cat4110-chevilleres','S-M-L-XL-XXL <br><br><center></center>', 'HB-7007', array('hb7007'));
        $this->creerProduit(100,45,$manager, 'Orthèse stabilisatrice Air-cast', 'cat4110-chevilleres',' <br><br><center><iframe style="width:80%" height="465" src="https://www.youtube.com/embed/6kfpVvGEfwY" frameborder="0" allowfullscreen></iframe></center>', 'AB-01', array('ab01'));

        $this->creerProduit(100,50,$manager, 'Chaussure à Plâtre', 'cat4110-chevilleres','PM - GM <br><br><center></center>', 'AB-05', array('ab05'));
        $this->creerProduit(100,45,$manager, 'Chaussure à Platre', 'cat4110-chevilleres',' <br><br><center></center>', 'AB-05b', array('ab05b'));
        $this->creerProduit(100,40,$manager, 'Orthèse de Cheville de Rotation', 'cat4110-chevilleres',' <br><br><center></center>', 'AB-13', array('ab13'));
        $this->creerProduit(100,35,$manager, 'Botte Réglable', 'cat4110-chevilleres',' <br><br><center><iframe style="width:80%" height="465" src="https://www.youtube.com/embed/SOUyBGJO1M8" frameborder="0" allowfullscreen></iframe></center>', 'HB-5051', array('hb5051'));
        $this->creerProduit(100,30,$manager, 'Bande de charge', 'cat4110-chevilleres','1-3-5 kg <br><br><center></center>', 'HB-5020', array('hb5020'));


        $this->creerProduit(100,40,$manager, 'Semelles en Silicone', 'cat4111-semelles','S-M-L-XL <br><br><center></center>', 'SS-004', array('ss004'));
        $this->creerProduit(100,30,$manager, 'Semelles 3/4', 'cat4111-semelles','S-M-L <br><br><center></center>', 'SS-003', array('ss003'));
        $this->creerProduit(100,35,$manager, 'Semelles en SiliconeSurface anti-Bactérienne', 'cat4111-semelles','S-M-L-XL <br><br><center></center>', 'SS-007', array('ss007'));
        $this->creerProduit(100,45,$manager, 'Talonnette en Silicone pour Épine Calcaniènne', 'cat4111-semelles','S-M-L <br><br><center></center>', 'SS-002', array('ss002'));
        $this->creerProduit(100,50,$manager, 'Séparateur d\'orteilles en Silicone', 'cat4111-semelles','S-M <br><br><center></center>', 'SS-005', array('ss005'));

        $this->creerProduit(100,35,$manager, 'Coussin Plantaire en Silicone', 'cat4111-semelles',' <br><br><center></center>', 'SS-006-A', array('ss006a'));
        $this->creerProduit(100,40,$manager, 'Bande Protectrice avant pied (durillons cors)', 'cat4111-semelles','D-G <br><br><center></center>', 'SS-006', array('ss006'));
        $this->creerProduit(100,30,$manager, 'Attelle Hallux Valgus', 'cat4111-semelles','D-G <br><br><center><iframe style="width:80%" height="465" src="https://www.youtube.com/embed/NASTagIYzeY" frameborder="0" allowfullscreen></iframe></center>', 'HB-6010', array('hb6010'));
        $this->creerProduit(100,35,$manager, 'Bandage Hallux Valgus', 'cat4111-semelles',' <br><br><center><iframe style="width:80%" height="465" src="https://www.youtube.com/embed/qUvlL4BHUAI" frameborder="0" allowfullscreen></iframe></center>', 'HB-7010', array('hb7010'));
        $this->creerProduit(100,40,$manager, 'Attelle Hallux Valgus', 'cat4111-semelles','D-G <br><br><center><iframe style="width:80%" height="465" src="https://www.youtube.com/embed/7gXsTZ4283I" frameborder="0" allowfullscreen></iframe></center>', 'HB-5010', array('hb5010'));

        $this->creerProduit(100,35,$manager, 'Support Mollet', 'cat4112-cuissard','S-M-L-XL-XXL <br><br><center></center>', 'HB-7101', array('hb7101'));
        $this->creerProduit(100,40,$manager, 'Support Cuisse avec Stabilisation hanche', 'cat4112-cuissard','S-M-L-XL-XXL <br><br><center></center>', 'HB-7108', array('hb7108'));
        $this->creerProduit(100,20,$manager, 'Support Cuisse', 'cat4112-cuissard','S-M-L-XL-XXL <br><br><center></center>', 'HB-7105', array('hb7105'));
        $this->creerProduit(100,30,$manager, 'Support Cuisse Standard', 'cat4112-cuissard',' <br><br><center></center>', 'HB-5105', array('hb5105'));

        $this->creerProduit(100,35,$manager, 'Anti-embolisme', 'cat4113-contention-elastique','18-20 mmHG <br><br><center></center>', 'MS-400-100', array('ms400100'));
        $this->creerProduit(100,40,$manager, 'Anti-embolisme', 'cat4113-contention-elastique','18-20 mmHG <br><br><center></center>', 'MS-400-200', array('ms400200'));
        $this->creerProduit(100,55,$manager, 'Anti-embolisme', 'cat4113-contention-elastique','18-20 mmHG <br><br><center></center>', 'MS-400-300', array('ms400300'));
        $this->creerProduit(100,50,$manager, 'Chaussette pour varice', 'cat4113-contention-elastique','30-40 mmHG <br><br><center></center>', 'MS-400-400', array('msms1'));
        $this->creerProduit(100,45,$manager, 'Braccial', 'cat4113-contention-elastique','S - M <br><br><center></center>', 'MS-500', array('ms500', 'ms600'));
        $this->creerProduit(100,40,$manager, 'Collant pour Varice', 'cat4113-contention-elastique','30-40 mmHG <br><br><center></center>', 'MS-400-600', array('msms2'));
        $this->creerProduit(100,35,$manager, 'Bas Autofixant Monocollant', 'cat4113-contention-elastique','30-40 mmHG <br><br><center></center>', 'MS-400-700', array('msms3'));

        $this->creerProduit(100,40,$manager, 'Short Sauna', 'cat4114-esthetique','S-M-L-XL-XXL <br><br><center></center>-XXXL', 'HB-5201', array('hb5201'));
        $this->creerProduit(100,60,$manager, 'Slip Haut', 'cat4114-esthetique','3-4-5-6-7 <br><br><center></center>', 'HB-5264', array('hb5264'));
        $this->creerProduit(100,50,$manager, 'Libopanty', 'cat4114-esthetique','3-4-5-6-7 <br><br><center></center>', 'HB-5266', array('hb5266'));
        $this->creerProduit(100,55,$manager, 'Gaine Complète', 'cat4114-esthetique',' <br><br><center></center>', 'HB-5265', array('hb5265'));
        $this->creerProduit(100,30,$manager, 'Ceinture Inguinal Bilatérale', 'cat4114-esthetique',' <br><br><center></center>', 'HB-7270-B', array('hb7270b'));
        $this->creerProduit(100,35,$manager, 'Ceinture Inguinal', 'cat4114-esthetique','D-G <br><br><center></center>', 'HB-7270-A', array('hb7270a'));
        $this->creerProduit(100,25,$manager, 'Prothèse Mammaire + Soutien gorge', 'cat4114-esthetique',' <br><br><center></center>', 'HB-5285', array('hb5285'));


        /* ========== Sabot ========== */
        $this->creerProduit(100,20,$manager, 'Sabot orthopédique', 'cat611-sabot-orthopedique',Description::$sabot, 'SB-001', array('sabot01','sabot02'));
        $this->creerProduit(100,25,$manager, 'Sabot orthopédique 2', 'cat611-sabot-orthopedique',Description::$sabot, 'SB-002', array('sabot03','sabot04'));
        $this->creerProduit(100,28,$manager, 'Sabot orthopédique 3', 'cat611-sabot-orthopedique',Description::$sabot, 'SB-003', array('sabot05','sabot06'));
        $this->creerProduit(100,30,$manager, 'Sabot orthopédique 4', 'cat611-sabot-orthopedique',Description::$sabot, 'SB-004', array('sabot07','sabot08'));
        $this->creerProduit(100,25,$manager, 'Sabot orthopédique 5', 'cat611-sabot-orthopedique',Description::$sabot, 'SB-005', array('sabot09','sabot10'));
        $this->creerProduit(100,30,$manager, 'Chaussure orthopédique', 'cat613-chaussures-othopediques',Description::$sabot, 'SB-006', array('sabot11','sabot12'));
        $this->creerProduit(100,30,$manager, 'Sabot orthopédique', 'cat612-sabot-de-bloc',Description::$sabot, 'SB-007', array('sabot13','sabot14','sabot15','sabot16'));

        /* ========== Aide à la marche ========== */
        $this->creerProduit(100,20,$manager,'Canne Canadienne', 'cat511-canne',Description::$canne,'C1-001',array('canne01'));
        $this->creerProduit(100,25,$manager,'Canne Canadienne 2', 'cat511-canne',Description::$canne,'C1-002',array('canne02'));
        $this->creerProduit(100,30,$manager,'Canne 3', 'cat511-canne',Description::$canne,'C1-003',array('canne03'));
        $this->creerProduit(100,30,$manager,'Canne 4', 'cat511-canne',Description::$canne,'C1-004',array('canne04'));
        $this->creerProduit(100,45,$manager,'Canne Tripode', 'cat511-canne',Description::$canne,'C1-005',array('canne05'));
        $this->creerProduit(100,30,$manager,'Canne 6', 'cat511-canne',Description::$canne,'C1-006',array('canne06'));
        $this->creerProduit(100,40,$manager,'Deambulateur', 'cat512-deambulateur',Description::$canne,'C1-007',array('canne07'));
        $this->creerProduit(100,50,$manager,'Deambulateur', 'cat512-deambulateur',Description::$canne,'C1-008',array('canne08'));
        $this->creerProduit(100,45,$manager,'Aide à la marche 1', 'cat512-deambulateur',Description::$canne,'A1-009',array('canne09'));
        $this->creerProduit(100,45,$manager,'Aide à la marche 2', 'cat512-deambulateur',Description::$canne,'A1-010',array('canne10'));
        $this->creerProduit(100,40,$manager,'Aide à la marche 3', 'cat512-deambulateur',Description::$canne,'A1-011',array('canne11'));
        $this->creerProduit(100,60,$manager,'Roulateur à 4 roues', 'cat512-deambulateur',Description::$canne,'R1-012',array('canne12'));


        $this->creerProduit(100,130,$manager, 'Fauteuil', 'cat513-fauteil-roulant', Description::$fauteuil, '01-ft1', array('fauteil01') );
        $this->creerProduit(100,50,$manager, 'Fauteuil', 'cat513-fauteil-roulant',  Description::$fauteuil, '01-ft2', array('fauteil02') );
        $this->creerProduit(100,210,$manager, 'Fauteuil roulant', 'cat513-fauteil-roulant', Description::$fauteuil, '01-ft3', array('fauteil03') );
        $this->creerProduit(100,230,$manager, 'Fauteuil roulant 2', 'cat513-fauteil-roulant',  Description::$fauteuil, '02-ft4', array('fauteil04') );
        $this->creerProduit(100,280,$manager, 'Fauteuil roulant 3', 'cat513-fauteil-roulant',  Description::$fauteuil, '02-ft5', array('fauteil05') );
        $this->creerProduit(100,250,$manager, 'Fauteuil roulant 4', 'cat513-fauteil-roulant',  Description::$fauteuil, '02-ft6', array('fauteil06') );
        $this->creerProduit(100,300,$manager, 'Fauteuil roulant 5', 'cat513-fauteil-roulant',  Description::$fauteuil, '02-ft7', array('fauteil07') );
        $this->creerProduit(100,100,$manager, 'Fauteuil roulant 6', 'cat513-fauteil-roulant',  Description::$fauteuil, '02-ft8', array('fauteil08') );
        $this->creerProduit(100,140,$manager, 'Fauteuil roulant 7', 'cat513-fauteil-roulant',  Description::$fauteuil, '02-ft9', array('fauteil09') );
        $this->creerProduit(100,200,$manager, 'Fauteuil roulant 8', 'cat513-fauteil-roulant',  Description::$fauteuil, '02-ft10', array('fauteil10') );
        $this->creerProduit(100,180,$manager, 'Fauteuil roulant 9', 'cat513-fauteil-roulant',  Description::$fauteuil, '02-ft11', array('fauteil11') );
        $this->creerProduit(100,150,$manager, 'Fauteuil roulant 10', 'cat513-fauteil-roulant',  Description::$fauteuil, '02-ft12', array('fauteil12') );
        $this->creerProduit(100,260,$manager, 'Fauteuil roulant 11', 'cat513-fauteil-roulant',  Description::$fauteuil, '02-ft13', array('fauteil13') );
        $this->creerProduit(100,80,$manager, 'Fauteuil', 'cat513-fauteil-roulant',  Description::$fauteuil, '03-ft14', array('fauteil14') );

        $this->creerProduit(100,120,$manager, 'Lit Électrique', 'cat514-lit-medical',Description::$liisinox,'M14-P1',array('lit01','lit02'));
        $this->creerProduit(100,200,$manager, 'Lit Epoxy', 'cat514-lit-medical',Description::$liisinox,'M14-P2',array('lit03'));
        $this->creerProduit(100,150,$manager, 'Lit Inox', 'cat514-lit-medical',Description::$liisinox,'M14-P3',array('lit04'));

        $manager->flush();
        $produits = $manager->getRepository('WebAdminBundle:Produit')->findAll();
        foreach($produits as $elem){
            $elem->creerLien();
            $manager->persist($elem);
        }
        $manager->flush();
    }

    public function getOrder(){
        return 4;
    }

}
