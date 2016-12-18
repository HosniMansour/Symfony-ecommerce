<?php

namespace Web\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;


/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="Web\AdminBundle\Repository\CategorieRepository")
 * @ExclusionPolicy("all")
 */
class Categorie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     * @Expose
     */
    private $nom;

    /**
     * @var string
     * @ORM\Column(name="lien", type="string", nullable=true)
     * @Expose
     */
    private $lien;

    /**
     * @ORM\OneToMany(targetEntity="Produit", mappedBy="categorie")
     */
    private $produits;

    /**
     * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="filles")
     * @ORM\JoinColumn(name="mere_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $mere;

    /**
     * @ORM\OneToMany(targetEntity="Categorie", mappedBy="mere", cascade={"persist", "remove"})
     */
    private $filles;

    private $ref;

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produits = new \Doctrine\Common\Collections\ArrayCollection();
        $this->filles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->creerLien();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Categorie
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        $this->creerLien();
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Add produits
     *
     * @param \Web\AdminBundle\Entity\Produit $produits
     * @return Categorie
     */
    public function addProduit(\Web\AdminBundle\Entity\Produit $produits)
    {
        $this->produits[] = $produits;

        return $this;
    }

    /**
     * Remove produits
     *
     * @param \Web\AdminBundle\Entity\Produit $produits
     */
    public function removeProduit(\Web\AdminBundle\Entity\Produit $produits)
    {
        $this->produits->removeElement($produits);
    }

    /**
     * Get produits
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProduits()
    {
        return $this->produits;
    }

    /**
     * Set mere
     *
     * @param \Web\AdminBundle\Entity\Categorie $mere
     * @return Categorie
     */
    public function setMere(\Web\AdminBundle\Entity\Categorie $mere = null)
    {
        $this->mere = $mere;
        return $this;
    }

    /**
     * Get mere
     *
     * @return \Web\AdminBundle\Entity\Categorie 
     */
    public function getMere()
    {
        return $this->mere;
    }

    /**
     * Add filles
     *
     * @param \Web\AdminBundle\Entity\Categorie $filles
     * @return Categorie
     */
    public function addFille(\Web\AdminBundle\Entity\Categorie $filles)
    {
        $this->filles[] = $filles;

        return $this;
    }

    /**
     * Remove filles
     *
     * @param \Web\AdminBundle\Entity\Categorie $filles
     */
    public function removeFille(\Web\AdminBundle\Entity\Categorie $filles)
    {
        $this->filles->removeElement($filles);
    }

    /**
     * Get filles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFilles()
    {
        return $this->filles;
    }

    /**
     * Set lien
     *
     * @param string $lien
     * @return Categorie
     */
    public function setLien($lien)
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * Get lien
     *
     * @return string 
     */
    public function getLien()
    {
        return $this->lien;
    }

    public function setRef($ref)
    {
        $this->ref = $ref;
    }

    public function getRef()
    {
        return $this->ref;
    }

    public function creerLien()
    {
        $str = $this->nom;
        $str = trim($str);
        $str = $this->transliterateString($str);
        $tab = array('  ' => ' ' , ' ' => '-' , '\'' => '-' , '°' => '' , '^' => '' , '/' => '' ,
        '\\' => '' , '(' => '' , ')' => '' , '[' => '' , ']' => '' , '{' => '' , '}' => '' ,
        '.' => '' , '#' => '' , '$' => '' , '%' => '' , '&' => '' , '²' => '' , '|' => '',
        '+' => '', '*' => '', ',' => '', ';' => '', '_' => '-', '"' => '');
        $str = str_replace(array_keys($tab), array_values($tab), $str);
        if($this->nom === 'Medor' || $this->nom === 'Equipement Cabinet' ||
            $this->nom === 'Cabinet Realisé' || $this->nom === 'Accessoires Orthopédiques' ||
            $this->nom === 'Aide à la Marche' || $this->nom === 'Sabot Orthopédique') {

            $this->lien = strtolower($str);
        }
        else
            $this->lien = 'c'.$this->getId().'-'.strtolower($str);
        $this->ref = strtolower($str);
    }

    function transliterateString($txt) {
        $transliterationTable = array('á' => 'a',
            'Á' => 'A', 'à' => 'a', 'À' => 'A', 'ă' => 'a', 'Ă' => 'A', 'â' => 'a', 'Â' => 'A', 'å' => 'a',
            'Å' => 'A', 'ã' => 'a', 'Ã' => 'A', 'ą' => 'a', 'Ą' => 'A', 'ā' => 'a', 'Ā' => 'A', 'ä' => 'ae',
            'Ä' => 'AE', 'æ' => 'ae', 'Æ' => 'AE',
            'ḃ' => 'b', 'Ḃ' => 'B',
            'ć' => 'c', 'Ć' => 'C', 'ĉ' => 'c', 'Ĉ' => 'C', 'č' => 'c', 'Č' => 'C', 'ċ' => 'c', 'Ċ' => 'C',
            'ç' => 'c', 'Ç' => 'C',
            'ď' => 'd', 'Ď' => 'D', 'ḋ' => 'd', 'Ḋ' => 'D', 'đ' => 'd', 'Đ' => 'D', 'ð' => 'dh', 'Ð' => 'Dh',
            'é' => 'e', 'É' => 'E', 'è' => 'e', 'È' => 'E', 'ĕ' => 'e', 'Ĕ' => 'E', 'ê' => 'e', 'Ê' => 'E',
            'ě' => 'e', 'Ě' => 'E', 'ë' => 'e', 'Ë' => 'E', 'ė' => 'e', 'Ė' => 'E', 'ę' => 'e', 'Ę' => 'E',
            'ē' => 'e', 'Ē' => 'E',
            'ḟ' => 'f', 'Ḟ' => 'F', 'ƒ' => 'f', 'Ƒ' => 'F',
            'ğ' => 'g', 'Ğ' => 'G', 'ĝ' => 'g', 'Ĝ' => 'G', 'ġ' => 'g', 'Ġ' => 'G', 'ģ' => 'g', 'Ģ' => 'G',
            'ĥ' => 'h', 'Ĥ' => 'H', 'ħ' => 'h', 'Ħ' => 'H',
            'í' => 'i', 'Í' => 'I', 'ì' => 'i', 'Ì' => 'I', 'î' => 'i', 'Î' => 'I', 'ï' => 'i', 'Ï' => 'I',
            'ĩ' => 'i', 'Ĩ' => 'I', 'į' => 'i', 'Į' => 'I', 'ī' => 'i', 'Ī' => 'I',
            'ĵ' => 'j', 'Ĵ' => 'J',
            'ķ' => 'k', 'Ķ' => 'K',
            'ĺ' => 'l', 'Ĺ' => 'L', 'ľ' => 'l', 'Ľ' => 'L', 'ļ' => 'l', 'Ļ' => 'L', 'ł' => 'l', 'Ł' => 'L',
            'ṁ' => 'm', 'Ṁ' => 'M',
            'ń' => 'n', 'Ń' => 'N', 'ň' => 'n', 'Ň' => 'N', 'ñ' => 'n', 'Ñ' => 'N', 'ņ' => 'n', 'Ņ' => 'N',
            'ó' => 'o', 'Ó' => 'O', 'ò' => 'o', 'Ò' => 'O', 'ô' => 'o', 'Ô' => 'O', 'ő' => 'o', 'Ő' => 'O',
            'õ' => 'o', 'Õ' => 'O', 'ø' => 'oe', 'Ø' => 'OE', 'ō' => 'o', 'Ō' => 'O', 'ơ' => 'o', 'Ơ' => 'O',
            'ö' => 'oe', 'Ö' => 'OE',
            'ṗ' => 'p', 'Ṗ' => 'P',
            'ŕ' => 'r', 'Ŕ' => 'R', 'ř' => 'r', 'Ř' => 'R', 'ŗ' => 'r', 'Ŗ' => 'R',
            'ś' => 's', 'Ś' => 'S', 'ŝ' => 's', 'Ŝ' => 'S', 'š' => 's', 'Š' => 'S', 'ṡ' => 's', 'Ṡ' => 'S',
            'ş' => 's', 'Ş' => 'S', 'ș' => 's', 'Ș' => 'S', 'ß' => 'SS',
            'ť' => 't', 'Ť' => 'T', 'ṫ' => 't', 'Ṫ' => 'T', 'ţ' => 't', 'Ţ' => 'T', 'ț' => 't', 'Ț' => 'T',
            'ŧ' => 't', 'Ŧ' => 'T',
            'ú' => 'u', 'Ú' => 'U', 'ù' => 'u', 'Ù' => 'U', 'ŭ' => 'u', 'Ŭ' => 'U', 'û' => 'u', 'Û' => 'U',
            'ů' => 'u', 'Ů' => 'U', 'ű' => 'u', 'Ű' => 'U', 'ũ' => 'u', 'Ũ' => 'U', 'ų' => 'u', 'Ų' => 'U',
            'ū' => 'u', 'Ū' => 'U', 'ư' => 'u', 'Ư' => 'U', 'ü' => 'ue', 'Ü' => 'UE',
            'ẃ' => 'w', 'Ẃ' => 'W', 'ẁ' => 'w', 'Ẁ' => 'W', 'ŵ' => 'w', 'Ŵ' => 'W', 'ẅ' => 'w', 'Ẅ' => 'W',
            'ý' => 'y', 'Ý' => 'Y', 'ỳ' => 'y', 'Ỳ' => 'Y', 'ŷ' => 'y', 'Ŷ' => 'Y', 'ÿ' => 'y', 'Ÿ' => 'Y',
            'ź' => 'z', 'Ź' => 'Z', 'ž' => 'z', 'Ž' => 'Z', 'ż' => 'z', 'Ż' => 'Z',
            'þ' => 'th', 'Þ' => 'Th', 'µ' => 'u', 'а' => 'a', 'А' => 'a', 'б' => 'b', 'Б' => 'b', 'в' => 'v',
            'В' => 'v', 'г' => 'g', 'Г' => 'g', 'д' => 'd', 'Д' => 'd', 'е' => 'e', 'Е' => 'E', 'ё' => 'e',
            'Ё' => 'E', 'ж' => 'zh', 'Ж' => 'zh', 'з' => 'z', 'З' => 'z', 'и' => 'i', 'И' => 'i', 'й' => 'j',
            'Й' => 'j', 'к' => 'k', 'К' => 'k', 'л' => 'l', 'Л' => 'l', 'м' => 'm', 'М' => 'm', 'н' => 'n',
            'Н' => 'n', 'о' => 'o', 'О' => 'o', 'п' => 'p', 'П' => 'p', 'р' => 'r', 'Р' => 'r', 'с' => 's',
            'С' => 's', 'т' => 't', 'Т' => 't', 'у' => 'u', 'У' => 'u', 'ф' => 'f', 'Ф' => 'f', 'х' => 'h',
            'Х' => 'h', 'ц' => 'c', 'Ц' => 'c', 'ч' => 'ch', 'Ч' => 'ch', 'ш' => 'sh', 'Ш' => 'sh',
            'щ' => 'sch', 'Щ' => 'sch', 'ъ' => '', 'Ъ' => '', 'ы' => 'y', 'Ы' => 'y', 'ь' => '', 'Ь' => '',
            'э' => 'e', 'Э' => 'e', 'ю' => 'ju', 'Ю' => 'ju', 'я' => 'ja', 'Я' => 'ja');
        return str_replace(array_keys($transliterationTable), array_values($transliterationTable), $txt);
    }
}
