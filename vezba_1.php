<?php

        $subject=
'BEGIN:VCARD
VERSION:2.1
N:Prezime;Ime;Srednje Ime;;Ime Sufix
FN:Ime Srednje Ime Prezime, Ime Sufix
EMAIL;PREF;INTERNET:forrestgump@example.com
TEL;HOME;VOICE:(404) 555-1212
PHOTO;GIF:http://www.example.com/dir_photos/my_photo.gif
TEL;HOME:066-961-9486
PHOTO;ENCODING=BASE64;JPEG:/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAIBAQEBAQIBAQE
 CAgICAgQDAgICAgUEBAMEBgUGBgYFBgYGBwkIBgcJBwYGCAsICQoKCgoKBggLDAsKDAkKCgr/
 2wBDAQICAgICAgUDAwUKBwYHCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKC
END:VCARD';
 
        
       function secenje($line){
            
        
 $pattern = '/([^:;]+)((;(.+)){0,1};(.+)){0,1}:(.*)/';
preg_match($pattern, $line, $matches);
var_dump($matches);
  return $matches;        
}
        
        
 
        
      foreach(preg_split("/((\r?\n)|(\r\n?))/", $subject) as $line){
       

       $niz[]=secenje( $line);
        
    
} 

foreach ($niz as $value) {
    
    if($value[1]!=='BEGIN' and $value[1]!=='END' and $value[1]!=='VERSION'){
         
       $nizvrstapolja[]= $value[1];
        if(!isset($value[4])){
            $nizpodnaziv[]=null;
        }else{
           $nizpodnaziv[]= $value[4]; 
        }
        if(!isset($value[3])){
            $nizpodnaziv2[]=null;
        }else{
           $nizpodnaziv2[]= $value[3];
        }
     
       $nizsadrzajpolja[]= $value[2];
    
    
    } 
}

var_dump($nizvrstapolja);
var_dump($nizpodnaziv);
var_dump($nizpodnaziv2);
var_dump($nizsadrzajpolja);