<?php

namespace Acme\CentralaBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Entity
* @ORM\Table(name="veze")
* @ORM\Entity(repositoryClass="Acme\CentralaBundle\Entity\VezeRepository")
*/
class Veze
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    
    protected $idveza;
    
    /**
     * @ORM\Column (type="string", length=20)
     * @Assert\NotBlank(message="radnik.ime.not_blank")
     *  @Assert\Length(
     *      min = "3",
     *      max = "20",
     *      minMessage = "radnik.ime.length.min",
     *      maxMessage = "radnik.ime.length.max")
     */
    
    protected $vlasnik;
    
   /**
     * @ORM\Column (type="string", length=20)
     * 
     */
    
    protected $vidljivost;
    
    
    
    

    /**
     * Get idveza
     *
     * @return integer 
     */
    public function getIdveza()
    {
        return $this->idveza;
    }

    /**
     * Set vlasnik
     *
     * @param string $vlasnik
     * @return Veze
     */
    public function setVlasnik($vlasnik)
    {
        $this->vlasnik = $vlasnik;

        return $this;
    }

    /**
     * Get vlasnik
     *
     * @return string 
     */
    public function getVlasnik()
    {
        return $this->vlasnik;
    }

    /**
     * Set vidljivost
     *
     * @param string $vidljivost
     * @return Veze
     */
    public function setVidljivost($vidljivost)
    {
        $this->vidljivost = $vidljivost;

        return $this;
    }

    /**
     * Get vidljivost
     *
     * @return string 
     */
    public function getVidljivost()
    {
        return $this->vidljivost;
    }
    
    
/**
* @ORM\OneToMany(targetEntity="Vcard", mappedBy="veze")
*/
   protected $vcard;
  
   public function __construct()
   {
        $this->vcard = new ArrayCollection();
         $this->names = new ArrayCollection();
   }

    /**
     * Add vcard
     *
     * @param \Acme\CentralaBundle\Entity\Vcard $vcard
     * @return Veze
     */
    public function addVcard(\Acme\CentralaBundle\Entity\Vcard $vcard)
    {
        $this->vcard[] = $vcard;

        return $this;
    }

    /**
     * Remove vcard
     *
     * @param \Acme\CentralaBundle\Entity\Vcard $vcard
     */
    public function removeVcard(\Acme\CentralaBundle\Entity\Vcard $vcard)
    {
        $this->vcard->removeElement($vcard);
    }

    /**
     * Get vcard
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVcard()
    {
        return $this->vcard;
    }
    
    /**
* @ORM\OneToMany(targetEntity="Vcard", mappedBy="veze")
*/
   protected $names;
  
   

    /**
     * Add names
     *
     * @param \Acme\CentralaBundle\Entity\Vcard $names
     * @return Veze
     */
    public function addName(\Acme\CentralaBundle\Entity\Vcard $names)
    {
        $this->names[] = $names;

        return $this;
    }

    /**
     * Remove names
     *
     * @param \Acme\CentralaBundle\Entity\Vcard $names
     */
    public function removeName(\Acme\CentralaBundle\Entity\Vcard $names)
    {
        $this->names->removeElement($names);
    }

    /**
     * Get names
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNames()
    {
        return $this->names;
    }
    
        /**
* @ORM\OneToMany(targetEntity="Numbers", mappedBy="veze")
*/
   protected $numbers;

    /**
     * Add numbers
     *
     * @param \Acme\CentralaBundle\Entity\Numbers $numbers
     * @return Veze
     */
    public function addNumber(\Acme\CentralaBundle\Entity\Vcard $numbers)
    {
        $this->numbers[] = $numbers;

        return $this;
    }

    /**
     * Remove numbers
     *
     * @param \Acme\CentralaBundle\Entity\Vcard $numbers
     */
    public function removeNumber(\Acme\CentralaBundle\Entity\Vcard $numbers)
    {
        $this->numbers->removeElement($numbers);
    }

    /**
     * Get numbers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNumbers()
    {
        return $this->numbers;
    }
}
