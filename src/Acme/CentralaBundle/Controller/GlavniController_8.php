<?php

namespace Acme\CentralaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request; // dodao zbog $_POST
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
TEL;WORK:559-688-65
TEL;HOME:986-464-646
TEL;PREF:665-673-883
TEL;WORK;FAX:646-759-595
TEL;HOME;FAX:64646565+4
TEL;PAGER:6538356565
TEL;VOICE:468-686-86468
TEL;X-Mojalabela:646-838-6565
EMAIL;HOME:gofof@fdd.com
EMAIL;WORK:gshdhd@ddd.com
EMAIL:godid@rfd.com
EMAIL;X-Mojalabela:gdjdjd@fgdc.com
ADR;HOME:;;Matije Hudji 66 ;;;;
ADR;WORK:;;Jna 100;;;;
ADR:;;Kralja Petra 33;;;;
ADR;X-Mojalabela:;;Petra Preradovica 6;;;;
ADR;HOME:;;Matije Hudji 66;;;;
ORG:Ime Kompanije
TITLE:Tajtl
ORG:Ime Kompanije
TITLE:Tajtl
URL:www.google.com
X-ANDROID-CUSTOM:vnd.android.cursor.item/contact_event;2008-06-16;1;;;;;;;;;;;;;
X-ANDROID-CUSTOM:vnd.android.cursor.item/contact_event;2014-06-16;0;Mojalabela;;;;;;;;;;;;
BDAY:2000-06-16
X-SIP:868688668
END:VCARD'; 
     // $em = $this->getDoctrine()->getManager();
    //$veze = $em->getRepository('AcmeCentralaBundle:Veze')->find(75);
        
        /*
         function utvrdjivanje ($tippolja){
        
        if (is_numeric($tippolja)) {
           $x=(int) $tippolja;
           return gettype($x);
        }
        return gettype($tippolja);
         }
        */ 
         
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
        
        if(strlen($value[4])==0){
            $vcard[$n]->setPodnaziv(null);
        }else{
            $vcard[$n]->setPodnaziv($value[4]);
           
        }
        if(strlen($value[5])==0){
            $vcard[$n]->setPodnaziv2(null);
        } else if(strlen($value[5])>0 and $value[4]==null){
            
            $vcard[$n]->setPodnaziv($value[5]);
            $vcard[$n]->setPodnaziv2(null);
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
    public function insertAction(Request $request){
        
        
        $veza= new Veze();
        $veza->setVlasnik('Goran Bjelobrk');
        $veza->setVidljivost('Private');
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($veza);
       
        
        
         // $em = $this->getDoctrine()->getManager();
    //$veze = $em->getRepository('AcmeCentralaBundle:Veze')->find(75)
        $vcard= new Vcard();
        $form= $this->createFormBuilder($vcard)
                ->setMethod('POST')
             

             
                ->add('sadrzaj_polja','text', array(
                       "label"=>$this->get ( 'translator' )->trans ( 'Ime i Prezime'),

                       "required"=>false,
                ))
                
                ->add('save', 'submit',array("label"=>$this->get ( 'translator' )->trans ( 'Sacuvaj')))
                ->getForm();
        
        $form->handleRequest($request);
        
        if ($form->isValid()) {
$em = $this->getDoctrine()->getEntityManager();
                
                $vcard->setVeze($veza);
                $vcard->setVrstaPolja('FN');
                $vcard->setPodnaziv(null);
                $vcard->setPodnaziv2(null);
                $em->persist($vcard);
                
                $em->flush();
                $build['form'] = $form->createView();
return $this->render('AcmeCentralaBundle:Pages:uspelo.html.twig' );
}
      return $this->render('AcmeCentralaBundle:Pages:insert.html.twig', array(
            'form' => $form->createView())); 
    }
}
