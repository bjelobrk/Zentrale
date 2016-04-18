<?php

namespace Acme\CentralaBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;



/**
* @ORM\Entity
* @ORM\Table(name="Names")
 * @ORM\Entity(repositoryClass="Acme\CentralaBundle\Entity\NamesRepository")
*/
class Names
{
       /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */ 
    protected $id;
    /**
     * @ORM\Column (type="string", length=50)
     * 
     */
     
    protected $name;

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
     * Set name
     *
     * @param string $name
     * @return Names
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    
      /**
    * @ORM\ManyToOne(targetEntity="Veze", inversedBy="names")
    * @ORM\JoinColumn(name="idveza", referencedColumnName="idveza")
    */
    protected $veze;

    /**
     * Set veze
     *
     * @param \Acme\CentralaBundle\Entity\Veze $veze
     * @return Names
     */
    public function setVeze(\Acme\CentralaBundle\Entity\Veze $veze = null)
    {
        $this->veze = $veze;

        return $this;
    }

    /**
     * Get veze
     *
     * @return \Acme\CentralaBundle\Entity\Veze 
     */
    public function getVeze()
    {
        return $this->veze;
    }
}
