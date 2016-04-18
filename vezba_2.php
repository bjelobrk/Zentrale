<?php

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
X-SIP:1111111111
TEL;HOME;VOICE:(404) 555-1212
END:VCARD';
 $pattern = '/([^:;]+)((;(.+)){0,1};(.+)){0,1}:(.*)/';
preg_match($pattern, $subject, $matches);
var_dump($matches);