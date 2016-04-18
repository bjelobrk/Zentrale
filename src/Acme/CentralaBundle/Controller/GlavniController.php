<?php

namespace Acme\CentralaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request; // dodao zbog $_POST
use Acme\CentralaBundle\Entity\Vcard;
use Acme\CentralaBundle\Entity\Veze;
use Acme\CentralaBundle\Entity\Card;
use Acme\CentralaBundle\Entity\Names;
use Acme\CentralaBundle\Entity\Numbers;
use Symfony\Component\HttpFoundation\BinaryFileResponse;// dodao zbog download
use Symfony\Component\HttpFoundation\ResponseHeaderBag;// dodao zbog download
use Symfony\Component\HttpFoundation\Response;// dodao da bi koristio ispis nakon obrade sa ajaxom


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
                 ->add('vlasnik', 'text', array('mapped' => false))// da ne bi input tretirao kao atribut objekta
                 ->add('vidljivost', 'choice', array('choices'   => array('Public' => 'Public', 'Private' => 'Private'),'mapped' => false, ))
                 ->add('save', 'submit',array("label"=>$this->get ( 'translator' )->trans ( 'Send')))
                ->getForm();


         $form->handleRequest($request);
 
             if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($card);
                $card->upload();
                $sadrzaj=  file_get_contents($card->getFullPath());
                   $vlasnik=$form->get('vlasnik')->getData();  // metoda za uzimanje inputa
                   $vidljivost=$form->get('vidljivost')->getData(); 
                   
               GlavniController::secenje($sadrzaj,$vlasnik,$vidljivost);    
               unlink($card->getFullPath());
 
                $build['form'] = $form->createView();
return $this->render('AcmeCentralaBundle:Pages:uspelo.html.twig',$build );
}
    
    return $this->render('AcmeCentralaBundle:Pages:upload.html.twig', array(
'form' => $form->createView())); 
    }

    public function insertformaAction() {
        
        
        return $this->render('AcmeCentralaBundle:Pages:insertforma.html.twig');
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
                
                
                $subject[]='FN:'.$ime.' '.$prezime."\n";
                $subject[]='ORG:'.$company."\n";
                $subject[]='TITLE:'.$title."\n";
                
                $n=0;
                $b=count($tel);
                for($x=0; $x<$b; $x++){
                    if($podnaziv[$n]=='WORK_FAX'){
                        $subject[]='TEL:WORK;FAX:'.$tel[$n]."\n";
                    }elseif ($podnaziv[$n]=='HOME_FAX') {
                        $subject[]='TEL:HOME;FAX:'.$tel[$n]."\n";
                    }
                    else{
                        $subject[]='TEL;'.$podnaziv[$n].':'.$tel[$n]."\n";
                    }
                    
                    $n++;
                }
                $b1=count($email);
                
                $n1=0;
                for($x=0; $x<$b1; $x++){
                $subject[]='EMAIL;'.$podnazive[$n1].':'.$email[$n1]."\n";
                     $n1++;
                }
                $b2=count($address);
                
                $n2=0;
                for($x=0; $x<$b2; $x++){
                $subject[]='ADR;'.$podnaziva[$n2].':'.$address[$n2]."\n";
                     $n2++;
                }
                $subject1=  implode($subject);
                $sadrzaj='BEGIN:VCARD'."\n".'VERSION:2.1'."\n".$subject1.'END:VCARD';
               
                GlavniController::secenje($sadrzaj,$vlasnik,$vidljivost);
                
      
                
        return $this->render('AcmeCentralaBundle:Pages:uspelo.html.twig');  
      
    }
    public function exportAction() {
        
         $request  = $this->getRequest();
           $em=  $this->getDoctrine()->getManager();
          
          $id=$request->request->get('box');
          $konacno='';
          foreach ($id as $value) {
              
              $vcard=$em->getRepository('AcmeCentralaBundle:Vcard')->findBy(array('veze'=> $value));
           foreach($vcard as $value){
             
            if($value->getPodnaziv2()==null and $value->getPodnaziv()!==null){
                $export[]= $value->getVrstaPolja().';'.$value->getPodnaziv().':'.$value->getSadrzajPolja()."\n";
            }else if($value->getPodnaziv()==null and $value->getPodnaziv2()==null){
                $export[]= $value->getVrstaPolja().':'.$value->getSadrzajPolja()."\n";
            }else{
                $export[]= $value->getVrstaPolja().';'.$value->getPodnaziv().';'.$value->getPodnaziv2().':'.$value->getSadrzajPolja()."\n";
            }
           
           
        }
         $export1=implode($export);
        $konacno.='BEGIN:VCARD'."\n".'VERSION:2.1'."\n".$export1.'END:VCARD'."\n";
          }
        
        
        $file = __DIR__.'/../../../../web/uploads/vcards/vcard.vcf';
      
        file_put_contents($file, $konacno);
        
        $filename='vcard.vcf';
         if (!file_exists($file)) {
            throw $this->createNotFoundException();
        }

        // prepare BinaryFileResponse
        $response = new BinaryFileResponse($file);
        $response->trustXSendfileTypeHeader();
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_INLINE,
            $filename,
            iconv('UTF-8', 'ASCII//TRANSLIT', $filename)
        );

        return $response; 
       
      
    }
     
    public function listAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
    $vcard = $em->getRepository('AcmeCentralaBundle:Vcard')->findAll();
    
        foreach ($vcard as $value) {

            $veze[$value->getVeze()->getIdveza()][]=$value;

        } 
          $criteria='all';
        
    return $this->render('AcmeCentralaBundle:Pages:list.html.twig',array(
        'veze'=>$veze,
        'criteria'=>$criteria,
          ));  
    }
    
    public function secenje($sadrzaj,$vlasnik,$vidljivost){
        
   
         function secenje($line){
            
        
            $pattern = '/([^:;]+)((;(.+)){0,1};(.+)){0,1}:(.*)/';
            preg_match($pattern, $line, $matches);

       return $matches; 
    
       }
    
      foreach(preg_split("/((\r?\n)|(\r\n?))/", $sadrzaj) as $line){
       

       $niz[]=secenje( $line);
  
} 
       function separation($value){
          
           $s=explode(" ", $value);
         
           return $s;
      }
      
      function telformat($string){
                   
          $one= preg_replace("/^00|\D/", "", $string);
      if( substr($one, 0, 2)=='06'){
             return preg_replace("/^06/", '+3816', $one);
             
         }else if(substr($one, 0, 2)=='01'){
             return preg_replace("/^01/", '+3811', $one);
             
         }else if(substr($one, 0, 2)=='02'){
             return preg_replace("/^02/", '+3812', $one);
             
         }else if(substr($one, 0, 2)=='03'){
             return preg_replace("/^03/", '+3813', $one);
             
         }else {
             return preg_replace("/^38/", '+38', $one);
         }
      }
      
        $v=1;
        $veze = array();
        $n=1;
        $vcard = array();
        $z=1;
        $tel = array();
        
        foreach ($niz as $value) {

          if(!isset($value[1]))          continue;

            if($value[1]=='BEGIN'){ 
                        $veze[$v]= new Veze();
                        $veze[$v]->setVlasnik($vlasnik);
                        $veze[$v]->setVidljivost($vidljivost);
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($veze[$v]);
                        
            }else{ 
 
      if($value[1]!=='BEGIN' and $value[1]!=='VERSION' and $value[1]!=='N' and $value[1]!=='END'and $value[1]!=='PHOTO'){
   
        $vcard[$n]= new Vcard();
        
        
         if($value[1]=='FN'){
         $g=1;
         $names = array();
         $b=quoted_printable_decode($value[6]);
         $niz=separation($b);
         foreach ($niz as $ispis) {
             
             $names[$g]= new Names();
             $names[$g]->setName($ispis);
             $names[$g]->setVeze($veze[$v]);
             
          $em->persist($names[$g]);
          $g++;
         }
       }
       
        if($value[1]=='TEL'){
        
         $c=telformat($value[6]);
                 
             $tel[$z]= new Numbers();
             $tel[$z]->setNumber($c);
             $tel[$z]->setVeze($veze[$v]);
             
          $em->persist($tel[$z]);
          $z++;
                  
       }
              
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
        
       if ($value[4]=='CHARSET=UTF-8'){
           $vcard[$n]->setPodnaziv(null);
           $vcard[$n]->setPodnaziv2(null);
           
       }
              
         $vcard[$n]->setSadrzajPolja(quoted_printable_decode($value[6]));
       
  
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
        
    }
   
      public function searchformAction() {
          
           $error='';
          
       return $this->render('AcmeCentralaBundle:Pages:search.html.twig', array(
           'error'=>$error,
           
       ));
     }
     
      public function searchAction(Request $request) {
          
          $request  = $this->getRequest();
          $criteria=$request->request->get('criteria');
          
       if (is_numeric($criteria)){
           
            $em = $this->getDoctrine()->getManager();
            $vcard = $em->getRepository('AcmeCentralaBundle:Numbers')->findAllByNumber($criteria);
         
       }else {
           
            $em = $this->getDoctrine()->getManager();
            $vcard = $em->getRepository('AcmeCentralaBundle:Names')->findAllByName($criteria);
       }
         
        foreach ($vcard as $value) {
           $arrayofid[]= $value->getVeze()->getIdveza();
        }
        if (isset($arrayofid)){
        foreach ($arrayofid as $value) {
            
            $vcard1[]=$em->getRepository('AcmeCentralaBundle:Vcard')->findBy(array('veze'=> $value));
        }
        }else{
            $error="No contacts matched your search.";
            return $this->render('AcmeCentralaBundle:Pages:search.html.twig', array(
                'error'=>$error,
               
            ));
        }
       
          return $this->render('AcmeCentralaBundle:Pages:list.html.twig', array(
              'veze'=>$vcard1,
               'criteria'=>$criteria,
          ));
      }
       public function search1Action($criteria) {
           $em = $this->getDoctrine()->getManager();
     
           $vcard=$em->getRepository('AcmeCentralaBundle:Vcard')->findBy(array('veze'=> $criteria));
    
         foreach ($vcard as $value) {

            $veze[$value->getVeze()->getIdveza()][]=$value;

        } 
         
       return $this->render('AcmeCentralaBundle:Pages:list.html.twig', array(
              'veze'=>$veze,
               'criteria'=>$criteria,
          ));
      }
      public function deleteAction(Request $request) {
          
           $request  = $this->getRequest();
           $em=  $this->getDoctrine()->getManager();
          
          $id=$request->request->get('box');
          foreach ($id as $value) {
              
             $veze=$em->getRepository('AcmeCentralaBundle:Vcard')->findBy(array('veze'=> $value));
          foreach ($veze as $value3) {
               $em->remove($value3);
          }
          
          $veze2=$em->getRepository('AcmeCentralaBundle:Names')->findBy(array('veze'=> $value));
            foreach ($veze2 as $value4) {
               $em->remove($value4);
          }
             $veze3=$em->getRepository('AcmeCentralaBundle:Numbers')->findBy(array('veze'=> $value));
            foreach ($veze3 as $value6) {
               $em->remove($value6);
          }
          $veze1=$em->getRepository('AcmeCentralaBundle:Veze')->findBy(array('idveza'=> $value));
            foreach ($veze1 as $value5) {
               $em->remove($value5);
          } 
          }
         $em->flush();
         return $this->render('AcmeCentralaBundle:Pages:uspelo.html.twig');  
      }
      
      public function ajaxAction(Request $request) {
          
           $request  = $this->getRequest();
           $em=  $this->getDoctrine()->getManager();
           $criteria=$request->request->get('searchit');
           
           
           if($criteria==''){
               $string='';
                return new Response($string);
           }
      
           $s=explode(" ", $criteria);
           
           foreach ($s as $value) {
               if($value!=='' ){
                   
                  $names[] = $em->getRepository('AcmeCentralaBundle:Names')->findAllByName($value);
                 
        
               }
                
           }
            
             function findDuplicates($niz){
                 $arr_unique = array_unique($niz);
                 $arr_duplicates = array_diff_assoc($niz, $arr_unique);

                  
                 return $arr_duplicates;
             }
           
             if(isset($s[1]) and $s[1]!==''){ 
                 
                 
                 $string ='<ul>';
                 
               
                  foreach ($names as $value) {
                       
                       if(count($value)==0){
                $string .='<li>No contacts matched your search.</li>';
            }
                     
                      foreach ($value as $vcard) {
                          
                   $niz[]=$vcard->getVeze()->getIdveza();
                   $niz1=  findDuplicates($niz);
                   
                      }
                    
                  }
                  
                     foreach ($niz1 as $value) {
                      $x1=$em->getRepository('AcmeCentralaBundle:Vcard')->findBy(array('veze'=> $value));
                      
                       foreach ($x1 as $value) {
                      
                         if($value->getVrstaPolja()=='FN' ){
                                $href='http://localhost/centrala/web/app_dev.php/'.$value->getVeze()->getIdveza().'/search1';
                                $string .='<li><a href="'.$href.'">'.$value->getSadrzajPolja().'</a></li>';
                        }
                     }
                     }
                 
                 $string .='</ul>';
                
                         return new Response($string);
                 
                 }elseif(isset($s[0]) and $s[0]!=='' ){
                          $string ='<ul>';
             
             foreach ($names as $value) {
               
                if(count($value)==0){
                $string .='<li>No contacts matched your search.</li>';
            }
           
               foreach ($value as $vcard) {
                   $niz[]=$vcard->getVeze()->getIdveza();
            
           }
           foreach ($niz as $value) {
                      $x=$em->getRepository('AcmeCentralaBundle:Vcard')->findBy(array('veze'=> $value));
                      
                               foreach ($x as $value) {
                        
                       
                   if($value->getVrstaPolja()=='FN' ){
                       $href='http://localhost/centrala/web/app_dev.php/'.$value->getVeze()->getIdveza().'/search1';
                       $string .='<li><a href="'.$href.'">'.$value->getSadrzajPolja().'</a></li>';
               }
               
              }
                 }
                  
           
               }
             $string .='</ul>';
          
                      return new Response($string);
                     
                 }
             
      }
} 
   


