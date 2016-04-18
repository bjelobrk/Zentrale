<?php

namespace Acme\CentralaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request; // dodao zbog $_POST
use Acme\CentralaBundle\Entity\Vcard;
use Acme\CentralaBundle\Entity\Veze;
use Acme\CentralaBundle\Entity\Card;


class GlavniController extends Controller
{
    
    public function indexAction(){
        
        return $this->render('AcmeCentralaBundle:Pages:index.html.twig');
        
    }
    
    public function uploadAction(Request $request)
    {
    
    $card= new Card();   
 $form = $this->createFormBuilder($card)
 ->setMethod('POST')
         ->add('cardFile')
         ->add('save', 'submit',array("label"=>$this->get ( 'translator' )->trans ( 'Sacuvaj')))
        ->getForm();
 $form->handleRequest($request);
 
 if ($form->isValid()) {
$em = $this->getDoctrine()->getEntityManager();
                $em->persist($card);
                $card->upload();
                $subject=  file_get_contents($card->getFullPath());
                $em->flush();
                $build['form'] = $form->createView();
return $this->render('AcmeCentralaBundle:Pages:uspelo.html.twig',$build );
}
    
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
 
    return $this->render('AcmeCentralaBundle:Pages:upload.html.twig', array(
'form' => $form->createView())); 
    }
    
     
    
    
    
    public function insertformaAction() {
        
        
        return $this->render('AcmeCentralaBundle:Pages:proba.html.twig');
    }
    
    
    public function insertAction(Request $request){
        
        
                $em = $this->getDoctrine()->getManager();
           
          

             

                $request  = $this->getRequest();
                $vlasnik=$request->request->get('vlasnik');
                $vidljivost=$request->request->get('vidljivost');
                
                
                
                $ime = $request->request->get('ime');
                $prezime=$request->request->get('prezime');
                $tel = $request->request->get('tel');
                $podnaziv=$request->request->get('podnaziv');
                $company=$request->request->get('company');
                $title=$request->request->get('title');
                $email=$request->request->get('email');
                $podnazive=$request->request->get('podnazive');
                $address=$request->request->get('address');
                $podnaziva=$request->request->get('podnaziva');
                $dates=$request->request->get('dates');
                $podnazivd=$request->request->get('podnazivd');
                
                $veza= new Veze();
                $veza->setVlasnik($vlasnik);
                $veza->setVidljivost($vidljivost);
                $em->persist($veza);
                
                
                $vcard= new Vcard();
                $vcard->setVeze($veza);
                $vcard->setVrstaPolja('FN');
                $vcard->setPodnaziv(null);
                $vcard->setPodnaziv2(null);
                $vcard->setSadrzajPolja($ime.' '.$prezime);
                $em->persist($vcard);
                   
                
                $vcard1= new Vcard();
                $vcard1->setVeze($veza);
                $vcard1->setVrstaPolja('ORG');
                $vcard1->setPodnaziv(null);
                $vcard1->setPodnaziv2(null);
                $vcard1->setSadrzajPolja($company);
                $em->persist($vcard1);
                
                
                $vcard2= new Vcard();
                $vcard2->setVeze($veza);
                $vcard2->setVrstaPolja('TITLE');
                $vcard2->setPodnaziv(null);
                $vcard2->setPodnaziv2(null);
                $vcard2->setSadrzajPolja($title);
                $em->persist($vcard2);
                
                $b=  count($tel);
               
                $n=0;
                 
                 $vcard= array();
               for($x=0; $x<$b; $x++){
                
                    $vcard[$n]= new Vcard();
                    $vcard[$n]->setVeze($veza);
                    $vcard[$n]->setVrstaPolja('TEL');
                    
                   if ($podnaziv[$n]=='WORK_FAX'){
                       $vcard[$n]->setPodnaziv('WORK');
                         $vcard[$n]->setPodnaziv2('FAX');
                   }else if ($podnaziv[$n]=='HOME_FAX'){
                       $vcard[$n]->setPodnaziv('HOME');
                         $vcard[$n]->setPodnaziv2('FAX');
                   }else{
                       $vcard[$n]->setPodnaziv($podnaziv[$n]);
                       $vcard[$n]->setPodnaziv2(null);
                   }
                  
                    $vcard[$n]->setSadrzajPolja($tel[$n]);
                   
                   $em->persist($vcard[$n]);
                 
                   $n++;
                  
               }
               $e= count($email)+$b;
              
                for($x=$b; $x<$e; $x++){
                
                    $vcard[$n]= new Vcard();
                    $vcard[$n]->setVeze($veza);
                    $vcard[$n]->setVrstaPolja('EMAIL');
                    $vcard[$n]->setPodnaziv($podnazive[$n-$b]);
                    $vcard[$n]->setPodnaziv2(null);
                    $vcard[$n]->setSadrzajPolja($email[$n-$b]);
                   
                   $em->persist($vcard[$n]);
                 
                   $n++;
                  
               }
               
               $f=count($address);
               $a=$e+$f;
               
                for($x=$e; $x<$a; $x++){
                
                    $vcard[$n]= new Vcard();
                    $vcard[$n]->setVeze($veza);
                    $vcard[$n]->setVrstaPolja('ADR');
                    $vcard[$n]->setPodnaziv($podnaziva[$n-$e]);
                    $vcard[$n]->setPodnaziv2(null);
                    $vcard[$n]->setSadrzajPolja($address[$n-$e]);
                   
                   $em->persist($vcard[$n]);
                 
                   $n++;
                  
               }
               
               $d=count($dates);
               $t=$a+$d;
               
               for($x=$a; $x<$t; $x++){
                
                    $vcard[$n]= new Vcard();
                    $vcard[$n]->setVeze($veza);
                    $vcard[$n]->setVrstaPolja($podnazivd[$n-$a]);
                    $vcard[$n]->setPodnaziv(null);
                    $vcard[$n]->setPodnaziv2(null);
                    $vcard[$n]->setSadrzajPolja($dates[$n-$a]);
                   
                   $em->persist($vcard[$n]);
                 
                   $n++;
                  
               }
               
               $em->flush();
                
               
                
        return $this->render('AcmeCentralaBundle:Pages:uspelo.html.twig',array(
            'post'=>$ime,
        ));  
      
    }
 
      
   
}
