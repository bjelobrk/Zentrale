<?php

namespace Acme\CentralaBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * VcardRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VcardRepository extends EntityRepository
{
   public function findAllByName($ime)
      {
       
        return $this->getEntityManager()
          
        ->createQuery('SELECT u FROM AcmeCentralaBundle:Vcard u WHERE u.sadrzaj_polja LIKE :name ')
        ->setParameter('name', '%'.$ime.'%') 
                
        ->getResult();

        
      } 
    
    
}
