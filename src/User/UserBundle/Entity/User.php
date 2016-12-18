<?php

namespace User\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Web\AdminBundle\Entity;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */

class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255,nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255,nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="text",nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255, nullable=true)
     */
    private $tel;

    /**
     * @ORM\OneToMany(targetEntity="Web\AdminBundle\Entity\Formu", mappedBy="user",  cascade={"persist", "remove"})
     */
    private $messages;

    /**
     * @ORM\OneToOne(targetEntity="\Web\AdminBundle\Entity\Media", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $image;

    /**
     * @ORM\OneToOne(targetEntity="\Web\AdminBundle\Entity\Parameter", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $parametre;

    /**
     * @ORM\OneToMany(targetEntity="Web\AdminBundle\Entity\Commande", mappedBy="user",  cascade={"persist", "remove"})
     */
    private $commandes;


    public function __construct()
    {
        $this->image = new Entity\Media();
        $this->image->setImage("default-avatar.png");
        parent::__construct();
    }


    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @param string $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    public function getCommandes()
    {
        return $this->commandes;
    }

    public function getParametre()
    {
        return $this->parametre;
    }

    public function setCommandes($commandes)
    {
        $this->commandes = $commandes;
    }

    public function setParametre($parametre)
    {
        $this->parametre = $parametre;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getMessages()
    {
        return $this->messages;
    }

    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

}
