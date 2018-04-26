<?php

namespace AppBundle\Entity;  

use Doctrine\ORM\Mapping as ORM;

use AppBundle\Form\UserInfoType;

/**
 * UserInfo
 *
 * @ORM\Table(name="user_info")
 * @ORM\Entity
 */
class UserInfo
{
    
    public function __construct() 
    {
        $this->setCreatedAt(new \DateTime());
    }  
    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="first_surname", type="string", length=255, nullable=false)
     */
    private $firstSurname;

    /**
     * @var string
     *
     * @ORM\Column(name="second_surname", type="string", length=255, nullable=false)
     */
    private $secondSurname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_birth", type="date", nullable=false)
     */
    private $dateOfBirth;

    /**
     * @var string
     *
     * @ORM\Column(name="place_of_birth", type="string", length=255, nullable=false)
     */
    private $placeOfBirth;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=1, nullable=false)
     */
    private $gender = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="post_code", type="string", length=255, nullable=false)
     */
    private $postCode;

    /**
     * @var string
     *
     * @ORM\Column(name="rfc", type="string", length=255, nullable=false)
     */
    private $rfc;

    /**
     * @var string
     *
     * @ORM\Column(name="curp", type="string", length=255, nullable=false)
     */
    private $curp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;



    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return UserInfo
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;    
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set firstSurname
     *
     * @param string $firstSurname
     *
     * @return UserInfo
     */
    public function setFirstSurname($firstSurname)
    {
        $this->firstSurname = $firstSurname;    
        return $this;
    }

    /**
     * Get firstSurname
     *
     * @return string
     */
    public function getFirstSurname()
    {
        return $this->firstSurname;
    }

    /**
     * Set secondSurname
     *
     * @param string $secondSurname
     *
     * @return UserInfo
     */
    public function setSecondSurname($secondSurname)
    {
        $this->secondSurname = $secondSurname;    
        return $this;
    }

    /**
     * Get secondSurname
     *
     * @return string
     */
    public function getSecondSurname()
    {
        return $this->secondSurname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return UserInfo
     */
    public function setEmail($email)
    {
        $this->email = $email;    
        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     *
     * @return UserInfo
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;    
        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set placeOfBirth
     *
     * @param string $placeOfBirth
     *
     * @return UserInfo
     */
    public function setPlaceOfBirth($placeOfBirth)
    {
        $this->placeOfBirth = $placeOfBirth;    
        return $this;
    }

    /**
     * Get placeOfBirth
     *
     * @return string
     */
    public function getPlaceOfBirth()
    {     
        return $this->placeOfBirth;        
    }   

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return UserInfo
     */
    public function setGender($gender)
    {
        $this->gender = $gender;    
        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set postCode
     *
     * @param string $postCode
     *
     * @return UserInfo
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;    
        return $this;
    }

    /**
     * Get postCode
     *
     * @return string
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * Set rfc
     *
     * @param string $rfc
     *
     * @return UserInfo
     */
    public function setRfc($rfc)
    {
        $this->rfc = $rfc;    
        return $this;
    }

    /**
     * Get rfc
     *
     * @return string
     */
    public function getRfc()
    {
        return $this->rfc;
    }

    /**
     * Set curp
     *
     * @param string $curp
     *
     * @return UserInfo
     */
    public function setCurp($curp)
    {
        $this->curp = $curp;    
        return $this;
    }

    /**
     * Get curp
     *
     * @return string
     */
    public function getCurp()
    {
        return $this->curp;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return UserInfo
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
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
     * Get getFullName 
     *
     * @return string
     */
    public function getFullName()
    {
        $sFullName = $this->getFirstName()." ".$this->getFirstSurname(). " ".$this->getSecondSurname();
        return $sFullName;
    }
    
     /**
     * Get NameplaceOfBirth 
     *
     * @return string
     */
    public function getNamePlaceOfBirth()
    {     
        $key = $this->placeOfBirth;
        $oUserInfoType = new UserInfoType();
        $aEntities =  array_flip($oUserInfoType->getEntities());        
        return $aEntities[$key];      
    }
    
  
}
