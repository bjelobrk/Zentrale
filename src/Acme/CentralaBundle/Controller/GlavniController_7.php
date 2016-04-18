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
X-SIP:868688668
TEL;HOME;VOICE:(404) 555-1212
END:VCARD
BEGIN:VCARD
VERSION:2.1
N:Prezime;Goran;Srednje Ime;;Ime Sufix
FN:Ime Srednje Ime Prezime, Ime Sufix
TEL;CELL:646-767-37



X-SIP:1111111111'; 
     // $em = $this->getDoctrine()->getManager();
    //$veze = $em->getRepository('AcmeCentralaBundle:Veze')->find(75);
      
       
       function secenje($line){
            
        
            $pattern = '/([^:;]+)((;(.+)){0,1};(.+)){0,1}:(.*)/';
            preg_match($pattern, $line, $matches);

       return $matches; 
    
       }
    
      foreach(preg_split("/((\r?\n)|(\r\n?))/", $subject) as $line){
       

       $niz[]=secenje( $line);
  
} 

        $v=1;
        $veze = array();
        $n=1;
        $vcard = array();
       
foreach ($niz as $value) {
    
  if(!isset($value[1]))          continue;
    
    if($value[1]=='BEGIN'){ 
                $veze[$v]= new Veze();
                $veze[$v]->setVlasnik('Goran Bjelobrk');
                $veze[$v]->setVidljivost('Public');
                $em = $this->getDoctrine()->getManager();
                $em->persist($veze[$v]);
    }else{ 
 
               
 
       
      if($value[1]!=='BEGIN' and $value[1]!=='VERSION'and $value[1]!=='END'and $value[1]!=='PHOTO'){
   
        $vcard[$n]= new Vcard();
        $vcard[$n]->setVrstaPolja( $value[1]);
        
        if(!isset($value[4])){
            
            $vcard[$n]->setPodnaziv(null);
        }else{
            $vcard[$n]->setPodnaziv($value[4]);
           
        }
        if(!isset($value[5])){
            $vcard[$n]->setPodnaziv2(null);
        } else if(isset($value[5]) and $value[4]==null){
            
            $vcard[$n]->setPodnaziv($value[5]);
        }
        else{
           $vcard[$n]->setPodnaziv2($value[5]);
        }
     
       $vcard[$n]->setSadrzajPolja($value[6]);
       $vcard[$n]->setTipPolja(gettype($value[6]));
       $vcard[$n]->setVeze($veze[$v]);
            $em = $this->getDoctrine()->getManager();
            $em->persist($vcard[$n]);
            $em->flush();
            $n=$n+1;
            
    }elseif ($value[1]=='END'){
       $v=$v+1;
    }
    
    }
      

}
 
  
        return $this->render('AcmeCentralaBundle:Pages:index.html.twig', array(

 'dump' => var_dump($vcard),

 ));
    }
}
