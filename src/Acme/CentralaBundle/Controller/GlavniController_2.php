<?php

namespace Acme\CentralaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\CentralaBundle\Entity\Vcard;
use Acme\CentralaBundle\Entity\Veze;

class GlavniController extends Controller
{
    public function indexAction()
    {
        $subject=
'BEGIN:VCARD
VERSION:2.1
N:Prezime;Ime;Srednje Ime;;Ime Sufix
FN:Ime Srednje Ime Prezime, Ime Sufix
TEL;CELL:646-767-37
END:VCARD
BEGIN:VCARD
VERSION:2.1
N:Prezime;Goran;Srednje Ime;;Ime Sufix
FN:Ime Srednje Ime Bjelobrk, Ime Sufix
TEL;WORK:11111111111
TEL;HOME:2222222222
END:VCARD';
         //$em = $this->getDoctrine()->getManager();
        // $veze = $em->getRepository('AcmeCentralaBundle:Veze')->find(75);
     
       
      function secenjeVrstaPolja($line)
{  
            
            
             $tacka=strpos($line, ':');// trazi lokaciju tacke
           
           if($tacka>7){ // ako je tacka na 7 mestu primenjuje secenje do prve ;
               $s=substr($line, 0, strpos($line, ';'));
           }else{  
               $s= substr($line, 0, strpos($line, ':'));
           } 
            return $s;
}
        function secenjePodnaziv($line)
                                       {  
          
       $s=substr($line, strpos($line, ';')+1,4 );
        $e=substr($line, strpos($line, ';')+1,7 );
        $p=substr($line, strpos($line, ';')+1,5 );
      if($s=='WORK' or $s=='HOME'or $s=='PREF'or $s=='CELL'){
          return $s;
      }elseif($e=='X-VOICE'){
          return $e;
      }elseif($p=='PAGER' or $p=='VOICE'){
          return $p;
      }
         


}  
        function secenjePodnaziv2($line)
{  
            
         $s=substr($line, strpos($line, 'WORK;')+5,5 );
         $e=substr($line, strpos($line, 'HOME;')+5,5 );
         $s1=substr($line, strpos($line, 'WORK;')+5,3 );
         $e1=substr($line, strpos($line, 'HOME;')+5,3 );
          if($s=='VOICE'){
         return $s;
          } 
         if($e=='VOICE'){
         return $e;
          } 
         if($s1=='FAX'){
         return $s1;
          } 
         if($e1=='FAX'){
         return $e1;
          } 
}

        function secenjeSadrzajPolja($line)
                                       {  
         //string substr ( string $string , int $start [, int $length ] )

          $s=substr($line, strrpos($line, ":")+1);
       
          return $s;
      }
         
        //$veze= new Veze();
        //$veze->setVlasnik('Goran Bjelobrk');
        //$veze->setVidljivost('Public'); 
      
      
            $n=1;
            $vcard = array();
            
         
        foreach(preg_split("/((\r?\n)|(\r\n?))/", $subject) as $line){
            $tragac=secenjeVrstaPolja( $line);
            if($tragac=='BEGIN'){
            foreach(preg_split("/((\r?\n)|(\r\n?))/", $subject) as $line){
            $vcard[$n]= new Vcard();
            $vcard[$n]->setVrstaPolja(secenjeVrstaPolja( $line));
            $vcard[$n]->setPodnaziv(secenjePodnaziv( $line)) ;
            $vcard[$n]->setPodnaziv2(secenjePodnaziv2( $line));
            $vcard[$n]->setSadrzajPolja(secenjeSadrzajPolja( $line));
            $vcard[$n]->setVeze($veze);
            $em = $this->getDoctrine()->getManager();
            $em->persist($vcard[$n]);
            $em->flush();
            $n=$n+1;
        } 
                
            }
            
        }
         
         
         
        
    
/*
    
        $vcard= new Vcard();
        $vcard->setVrstaPolja('TEL');
        $vcard->setPodnaziv('HOME');
        $vcard->setPodnaziv2('VOICE');
        $vcard->setSadrzajPolja('(111) 111-1212');
        $vcard->setTipPolja('string');
        $vcard->setVeze($veze);
        
        $vcard1= new Vcard();
        $vcard1->setVrstaPolja('TEL');
        $vcard1->setPodnaziv('WORK');
        $vcard1->setPodnaziv2('VOICE');
        $vcard1->setSadrzajPolja('(404) 555-1212');
        $vcard1->setTipPolja('string');
        $vcard1->setVeze($veze);
       

        $em = $this->getDoctrine()->getManager();
        $em->persist($veze);
        $em->persist($vcard);
        $em->persist($vcard1);
        $em->flush();
       */ 
        
        return $this->render('AcmeCentralaBundle:Pages:index.html.twig', array(

 'dump' => var_dump($vcard),
'tragac'=> var_dump($tragac),
 ));
    }
}
