<?php

        $subject=
'BEGIN:VCARD
VERSION:2.1
N:Prezime;Ime;Srednje Ime;;Ime Sufix
FN:Ime Srednje Ime Prezime, Ime Sufix
EMAIL;PREF;INTERNET:forrestgump@example.com
TEL;HOME;VOICE:(404) 555-1212
PHOTO;GIF:http://www.example.com/dir_photos/my_photo.gif
LABEL;HOME;ENCODING=QUOTED-PRINTABLE:42 Plantation St.=0D=0ABaytown, LA 30314=0D=0AUnited States of America';
  
        function secenjeVrstaPolja($line)
{  
          if(strpos($line, ' ')!==0 ) {
              
              $pattern = '/((;[^:;]+)(;[^;:]+){0,2}){0,2}:(.*)/';
              $s=preg_replace($pattern, '', $line); 
              if($s!=='BEGIN' and $s!=='END' and $s!=='VERSION'){
                return $s;
              }
           } 

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
        
 
$pattern = '/[^:]+:/';


 $s=preg_replace($pattern, '', $line); 
       
          return $s;
      
                                       }   


 
foreach(preg_split("/((\r?\n)|(\r\n?))/", $subject) as $line){
    $niz[]=$line;
    if(!is_null(secenjeVrstaPolja( $line))){
    $niz1[]= secenjeVrstaPolja( $line);
    $niz2[]= secenjePodnaziv( $line);
    $niz3[]= secenjePodnaziv2( $line);
    $niz4[]= secenjeSadrzajPolja( $line);
    }
} 
var_dump($niz);
var_dump($niz1);
var_dump($niz2);
var_dump($niz3);
var_dump($niz4);

//$mystring = 'abc';
//$findme   = 'c';
//echo  strpos($mystring, $findme);
//$pattern = '/:.*/'; // 
//$pattern1 = '/(.*):/';
//$pattern = "%:.*?:%";// brise sve izmedju : i :

//$pattern = '/[^:;]+)(;([^:;]+)){0,2}:(.*)/';
$pattern1 = '/;([^:;]+)(;[^:;]+):(.*)/';
$test1 = 'TEL;HOME;VOICE:(404) 555-1212';

 preg_replace($pattern1, '', $test1).'<br>'; 


$pattern1 = '/([^:;]+)(;[^;:]+){0,2}:(.*)/';
$test1 = 'TEL;HOME;VOICE:(404) 555-1212';

 echo preg_replace($pattern1, '', $test1); 

$subject = "URL:https://www.facebook.com/dacisasa";
//$pattern = '/(([^:;]+);([^;:]+){0,2}):(.*)/';

//$pattern = '/((.*)(;([^;:]+))(;([^;:]+))){0,2}:(.*)/'; najbolji do sad
//$pattern = '/([^:;]+);([^:;]+);([^:;]+):(.*)/'; jos bolji
//$pattern = '/(.+)[:;](.+)[:;](.+):(.*)/';
//$pattern = '/([^:;]+)([:;]([^:;]+;)([^:;]+)){0,2}:(.*)/'; valja za 1 i 3
//$pattern = '/([^:;]+)([:;]([^:;]+;){0,1}([^:;]+)){0,1}:(.*)/'; konacno resenje
//$pattern = '/([^:;]+)(;((.+);){0,1}([^;]+)){0,1}:(.*)/';
//$pattern = '/([^:;]+)((;(.+)){0,1};(.+)){0,1}:(.*)/';
$pattern = '/([^:;]+)((;(.+)){0,1};(.+)){0,1}:(.*)/';
preg_match($pattern, $subject, $matches);
var_dump($matches);

