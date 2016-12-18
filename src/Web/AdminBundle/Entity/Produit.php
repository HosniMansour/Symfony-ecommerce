<?php

namespace Web\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;


/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="Web\AdminBundle\Repository\ProduitRepository")
 * @ExclusionPolicy("all")
 */
class Produit
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
     * @ORM\Column(name="nom", type="string", length=150)
     * @Expose
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="decimal", precision=7, scale=3, nullable=true)
     * @Expose
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     * @Expose
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="\Web\AdminBundle\Entity\Media", cascade={"persist"})
     * @ORM\JoinTable(name="produit_photo", joinColumns={@ORM\JoinColumn(name="produit_id", referencedColumnName="id",onDelete="cascade")}, inverseJoinColumns={@ORM\JoinColumn(name="media_id", referencedColumnName="id", unique=true,onDelete="cascade")})
     * @Expose
     */
    private $photos;


    /**
     * @var int
     *
     * @ORM\Column(name="nbrstock", type="integer")
     * @Expose
     */
    private $nbrstock;

    /**
     * @var string
     * @ORM\Column(name="code", type="string", length=80, nullable=true)
     * @Expose
     */
    private $code;

    /**
     * @var string
     * @ORM\Column(name="lien", type="string", nullable=true)
     */
    private $lien;

    /**
     * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="produits")
     * @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
     * @Expose
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity="Web\AdminBundle\Entity\Formu", mappedBy="produit",  cascade={"persist", "remove"})
     */
    private $messages;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->creerLien();
        $this->photos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getNom().'';
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
     * @return Produit
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
     * Set prix
     *
     * @param string $prix
     * @return Produit
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
        return $this;
    }

    /**
     * Get prix
     *
     * @return string 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Produit
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add photos
     *
     * @param \Web\AdminBundle\Entity\Media $photos
     * @return Produit
     */
    public function addPhoto(\Web\AdminBundle\Entity\Media $photos)
    {
        $this->photos[] = $photos;
        return $this;
    }

    /**
     * Remove photos
     *
     * @param \Web\AdminBundle\Entity\Media $photos
     */
    public function removePhoto(\Web\AdminBundle\Entity\Media $photos)
    {
        $this->photos->removeElement($photos);
    }

    /**
     * Get photos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhotos()
    {
        return $this->photos;
    }


    /**
     * Set categorie
     *
     * @param \Web\AdminBundle\Entity\Categorie $categorie
     * @return Produit
     */
    public function setCategorie(\Web\AdminBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;
        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Web\AdminBundle\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Produit
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    public function getMessages()
    {
        return $this->messages;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    public function setPhotos($photos)
    {
        $this->photos = $photos;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set lien
     *
     * @param string $lien
     * @return Produit
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
        $this->lien = 'p'.$this->id.'-'.strtolower($str);
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

    /**
     * @return int
     */
    public function getNbrstock()
    {
        return $this->nbrstock;
    }

    /**
     * @param int $nbrstock
     */
    public function setNbrstock($nbrstock)
    {
        $this->nbrstock = $nbrstock;
    }
}
