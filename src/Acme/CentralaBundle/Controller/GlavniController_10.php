<?php

namespace Acme\CentralaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request; // dodao zbog $_POST
use Acme\CentralaBundle\Entity\Vcard;
use Acme\CentralaBundle\Entity\Veze;
use Acme\CentralaBundle\Entity\Card;
use Symfony\Component\HttpFoundation\BinaryFileResponse;// dodao zbog download
use Symfony\Component\HttpFoundation\ResponseHeaderBag;// dodao zbog download


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
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($card);
                $card->upload();
                $sadrzaj=  file_get_contents($card->getFullPath());
                   $vlasnik=$form->get('vlasnik')->getData();  // metoda za uzimanje inputa
                   $vidljivost=$form->get('vidljivost')->getData(); 
                   
               GlavniController::secenje($sadrzaj,$vlasnik,$vidljivost);    
      
 
                $build['form'] = $form->createView();
return $this->render('AcmeCentralaBundle:Pages:uspelo.html.twig',$build );
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
                
                
  
               /*
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
                
               */
                
        return $this->render('AcmeCentralaBundle:Pages:uspelo.html.twig');  
      
    }
    public function exportAction($veza) {
        
        $em=$this->getDoctrine()->getManager();
        
        $vcard=$em->getRepository('AcmeCentralaBundle:Vcard')->findBy(array('veze'=> $veza));
  
        
     
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
        $konacno='BEGIN:VCARD'."\n".'VERSION:2.1'."\n".$export1.'END:VCARD';
                      
        $file = __DIR__.'/../../../../web/uploads/vcards/vcard.vcf';
      
        file_put_contents($file, $konacno);
          
       
      return $this->render('AcmeCentralaBundle:Pages:export.html.twig');  
    }
     public function downloadAction($filename)
{
  /**
         * $basePath can be either exposed (typically inside web/)
         * or "internal"
         */
        $basePath = __DIR__.'/../../../../web/uploads/vcards';

        $filePath = $basePath.'/'.$filename;

        // check if file exists
        if (!file_exists($filePath)) {
            throw $this->createNotFoundException();
        }

        // prepare BinaryFileResponse
        $response = new BinaryFileResponse($filePath);
        $response->trustXSendfileTypeHeader();
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_INLINE,
            $filename,
            iconv('UTF-8', 'ASCII//TRANSLIT', $filename)
        );

        return $response;
    }
    public function listAction() {
        $em = $this->getDoctrine()->getManager();
    $vcard = $em->getRepository('AcmeCentralaBundle:Vcard')->findAll();

foreach ($vcard as $value) {
    
    $veze[$value->getVeze()->getIdveza()][]=$value;
    
}  


    return $this->render('AcmeCentralaBundle:Pages:list.html.twig',array(
        'veze'=>$veze,
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

        $v=1;
        $veze = array();
        $n=1;
        $vcard = array();
        
        foreach ($niz as $value) {

          if(!isset($value[1]))          continue;

            if($value[1]=='BEGIN'){ 
                        $veze[$v]= new Veze();
                        $veze[$v]->setVlasnik($vlasnik);
                        $veze[$v]->setVidljivost($vidljivost);
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
        
    }
    
} 
   

