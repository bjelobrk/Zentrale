<?php

namespace Acme\CentralaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="Numbers")
 * @ORM\Entity(repositoryClass="Acme\CentralaBundle\Entity\NumbersRepository")
*/
class Numbers
{
        /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */ 
    private $id;

    /**
     * @ORM\Column (type="string", length=50)
     * 
     */
    private $number;

    /**
    * @ORM\ManyToOne(targetEntity="Veze", inversedBy="numbers")
    * @ORM\JoinColumn(name="idveza", referencedColumnName="idveza")
    */
    private $veze;


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
     * Set number
     *
     * @param string $number
     * @return Numbers
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set veze
     *
     * @param \Acme\CentralaBundle\Entity\Veze $veze
     * @return Numbers
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
