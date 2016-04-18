<?php
$string="+382 32 (222) (333)";
$one= preg_replace("/^00|\D/", "", $string);
var_dump($one);
         if( substr($one, 0, 2)=='06'){
             echo preg_replace("/^06/", '+3816', $one);
             
         }else if(substr($one, 0, 2)=='01'){
             echo preg_replace("/^01/", '+3811', $one);
             
         }else if(substr($one, 0, 2)=='02'){
             echo preg_replace("/^02/", '+3812', $one);
             
         }else if(substr($one, 0, 2)=='03'){
             echo preg_replace("/^03/", '+3813', $one);
             
         }else if(substr($one, 0, 2)=='38'){
             echo preg_replace("/^38/", '+38', $one);
         }else{
             echo preg_replace("/^382/", '+382', $one);
         }
         
      
         
         