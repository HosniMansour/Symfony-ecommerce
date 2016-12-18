<?php

namespace Web\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="Web\AdminBundle\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\User", inversedBy="commandes")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\Column(type="datetime", name="date",nullable=true)
     */
    protected $date;

    /**
     * @ORM\Column(type="string", length=255, name="etat",nullable=true)
     */
    protected $etat = "encour";
    
    /**
     * @ORM\Column(type="string", length=255, name="modep",nullable=true)
     */
    protected $modep = "";


    /**
     * @ORM\OneToMany(targetEntity="Web\AdminBundle\Entity\LigneCommande", mappedBy="commande",  cascade={"persist", "remove"})
     */
    private $lignes;

    /**
     * @ORM\Column(name="total", type="decimal", precision=7, scale=3, nullable=true)
     */
    private $total = 0;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getLignes()
    {
        return $this->lignes;
    }

    public function setLignes($lignes)
    {
        $this->lignes = $lignes;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }
    
    /**
     * @return mixed
     */
    public function getModep()
    {
        return $this->modep;
    }

    /**
     * @param mixed $modep
     */
    public function setModep($modep)
    {
        $this->modep = $modep;
    }

}

