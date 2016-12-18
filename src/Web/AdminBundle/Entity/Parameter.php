<?php

namespace Web\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parameter
 *
 * @ORM\Table(name="parameter")
 * @ORM\Entity(repositoryClass="Web\AdminBundle\Repository\ParameterRepository")
 */
class Parameter
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NomSite", type="string", length=255)
     */
    private $nomSite;

    /**
     * @var string
     *
     * @ORM\Column(name="DescSite", type="text")
     */
    private $descSite;

    /**
     * @var string
     *
     * @ORM\Column(name="KeyWordSite", type="string", length=255)
     */
    private $keyWordSite;

    /**
     * @var string
     *
     * @ORM\Column(name="EmailNoti", type="string", length=100)
     */
    private $emailNoti;

    /**
     * @var string
     *
     * @ORM\Column(name="SocialNetwork", type="text")
     */
    private $SocialNetwork="<ul> <li><a target=\"_blank\" href=\"https://www.facebook.com/Medor--312350562158703/\"><i class=\"fa fa-facebook-square\"></i></a></li> <li><a target=\"_blank\" href=\"#\"><i class=\"fa fa-twitter-square\"></i></a></li> <li><a target=\"_blank\" href=\"#\"><i class=\"fa fa-google-plus-square\"></i></a></li> </ul>";


    /**
     * @var string
     *
     * @ORM\Column(name="FtrImpl", type="text")
     */
    private $ftrImpl;

    /**
     * @var string
     *
     * @ORM\Column(name="FtrAdr", type="text")
     */
    private $ftrAdr;

    /**
     * @var string
     *
     * @ORM\Column(name="FtrIntro", type="text")
     */
    private $ftrIntro;

    /**
     * Set id
     *
     * @param int $id
     * @return Parameter
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * Set nomSite
     *
     * @param string $nomSite
     * @return Parameter
     */
    public function setNomSite($nomSite)
    {
        $this->nomSite = $nomSite;

        return $this;
    }

    /**
     * Get nomSite
     *
     * @return string 
     */
    public function getNomSite()
    {
        return $this->nomSite;
    }

    /**
     * Set descSite
     *
     * @param string $descSite
     * @return Parameter
     */
    public function setDescSite($descSite)
    {
        $this->descSite = $descSite;

        return $this;
    }

    /**
     * Get descSite
     *
     * @return string 
     */
    public function getDescSite()
    {
        return $this->descSite;
    }

    /**
     * Set keyWordSite
     *
     * @param string $keyWordSite
     * @return Parameter
     */
    public function setKeyWordSite($keyWordSite)
    {
        $this->keyWordSite = $keyWordSite;

        return $this;
    }

    /**
     * Get keyWordSite
     *
     * @return string 
     */
    public function getKeyWordSite()
    {
        return $this->keyWordSite;
    }

    /**
     * Set emailNoti
     *
     * @param string $emailNoti
     * @return Parameter
     */
    public function setEmailNoti($emailNoti)
    {
        $this->emailNoti = $emailNoti;

        return $this;
    }

    /**
     * Get emailNoti
     *
     * @return string 
     */
    public function getEmailNoti()
    {
        return $this->emailNoti;
    }

    /**
     * Set ftrImpl
     *
     * @param string $ftrImpl
     * @return Parameter
     */
    public function setFtrImpl($ftrImpl)
    {
        $this->ftrImpl = $ftrImpl;

        return $this;
    }

    /**
     * Get ftrImpl
     *
     * @return string 
     */
    public function getFtrImpl()
    {
        return $this->ftrImpl;
    }

    /**
     * Set ftrAdr
     *
     * @param string $ftrAdr
     * @return Parameter
     */
    public function setFtrAdr($ftrAdr)
    {
        $this->ftrAdr = $ftrAdr;

        return $this;
    }

    /**
     * Get ftrAdr
     *
     * @return string 
     */
    public function getFtrAdr()
    {
        return $this->ftrAdr;
    }

    /**
     * Set ftrIntro
     *
     * @param string $ftrIntro
     * @return Parameter
     */
    public function setFtrIntro($ftrIntro)
    {
        $this->ftrIntro = $ftrIntro;

        return $this;
    }

    /**
     * Get ftrIntro
     *
     * @return string 
     */
    public function getFtrIntro()
    {
        return $this->ftrIntro;
    }


    /**
     * @param string $LinkTwitter
     */
    public function setLinkTwitter($LinkTwitter)
    {
        $this->LinkTwitter = $LinkTwitter;
    }

    /**
     * @return string
     */
    public function getSocialNetwork()
    {
        return $this->SocialNetwork;
    }

    /**
     * @param string $SocialNetwork
     */
    public function setSocialNetwork($SocialNetwork)
    {
        $this->SocialNetwork = $SocialNetwork;
    }
}
