<?php

namespace Acme\CentralaBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * NumbersRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NumbersRepository extends EntityRepository
{
    public function findAllByNumber($number)
      {
       
        return $this->getEntityManager()
          
        ->createQuery('SELECT u FROM AcmeCentralaBundle:Numbers u WHERE u.number LIKE :number ')
        ->setParameter('number', $number.'%') 
                
        ->getResult();

        
      } 
}
