<?php

namespace Acme\CentralaBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="vcard")
 * @ORM\Entity(repositoryClass="Acme\CentralaBundle\Entity\VcardRepository")
*/
class Vcard
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
    
    protected $vrsta_polja;
        
    /**
     * @ORM\Column (type="string", length=100, nullable=true)
     * 
     */
    
    
    protected $podnaziv;
    
      /**
     * @ORM\Column (type="string", length=100, nullable=true)
     * 
     */
    
    
    protected $podnaziv2;
    /**
     * @ORM\Column (type="string", length=4, options={"fixed" = true}, nullable=true)
     * 
     */
    
    protected $tip_polja;
    
    /**
     * @ORM\Column (type="string", length=250)
     * 
     */
    
    protected $sadrzaj_polja;


   

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
     * Set vrsta_polja
     *
     * @param string $vrstaPolja
     * @return Vcard
     */
    public function setVrstaPolja($vrstaPolja)
    {
        $this->vrsta_polja = $vrstaPolja;

        return $this;
    }

    /**
     * Get vrsta_polja
     *
     * @return string 
     */
    public function getVrstaPolja()
    {
        return $this->vrsta_polja;
    }

    /**
     * Set tip_polja
     *
     * @param \char $tipPolja
     * @return Vcard
     */
    public function setTipPolja($tipPolja)
    {
        $this->tip_polja = $tipPolja;

        return $this;
    }

    /**
     * Get tip_polja
     *
     * @return \char 
     */
    public function getTipPolja()
    {
        return $this->tip_polja;
    }

    /**
     * Set sadrzaj_polja
     *
     * @param string $sadrzajPolja
     * @return Vcard
     */
    public function setSadrzajPolja($sadrzajPolja)
    {
        $this->sadrzaj_polja = $sadrzajPolja;

        return $this;
    }

    /**
     * Get sadrzaj_polja
     *
     * @return string 
     */
    public function getSadrzajPolja()
    {
        return $this->sadrzaj_polja;
    }

    /**
     * Set podnaziv
     *
     * @param string $podnaziv
     * @return Vcard
     */
    public function setPodnaziv($podnaziv)
    {
        $this->podnaziv = $podnaziv;

        return $this;
    }

    /**
     * Get podnaziv
     *
     * @return string 
     */
    public function getPodnaziv()
    {
        return $this->podnaziv;
    }
    
 
    /**
    * @ORM\ManyToOne(targetEntity="Veze", inversedBy="vcard")
    * @ORM\JoinColumn(name="idveza", referencedColumnName="idveza")
    */
    protected $veze;
    

    /**
     * Set veze
     *
     * @param \Acme\CentralaBundle\Entity\Veze $veze
     * @return Vcard
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

    /**
     * Set podnaziv2
     *
     * @param string $podnaziv2
     * @return Vcard
     */
    public function setPodnaziv2($podnaziv2)
    {
        $this->podnaziv2 = $podnaziv2;

        return $this;
    }

    /**
     * Get podnaziv2
     *
     * @return string 
     */
    public function getPodnaziv2()
    {
        return $this->podnaziv2;
    }
}
