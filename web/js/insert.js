$(document).ready(function(){
   
  $( ".dugme" ).click(function(event) {
      var input;
      input='<div class=polje><input type="text" name="tel[]" placeholder="Phone"><select class="podnaziv" name="podnaziv[]">\n\
<option value="MOBILE">MOBILE</option>\n\
<option value="WORK">WORK</option>\n\
<option value="HOME">HOME</option>\n\
<option value="WORK_FAX">WORK FAX</option>\n\
<option value="HOME_FAX">HOME FAX</option>\n\
<option value="OTHER">OTHER</option>\n\
<option value="CUSTOM">CUSTOM</option>\n\
</select><button class="x" >X</button><br></div>'
       event.preventDefault();
       
       $( ".telefoni" ).append(input);
       
       $(".x").click(function(event) {

       event.preventDefault();
        $(this).parent().remove();
      });
      });

    $( ".dugme2" ).click(function(event) {
      var input;
      input='<div class=polje><input type="text" name="email[]" placeholder="Email"><select class="podnazive" name="podnazive[]">\n\
<option value="WORK">WORK</option>\n\
<option value="HOME">HOME</option>\n\
<option value="OTHER">OTHER</option>\n\
<option value="CUSTOM">CUSTOM</option>\n\
</select><button class="xe" >X</button><br></div>'
       event.preventDefault();
       
       $( ".mejlovi" ).append(input);
       
       $(".xe").click(function(event) {

       event.preventDefault();
        $(this).parent().remove();
      });
      });
$( ".dugme3" ).click(function(event) {
      var input;
      input='<div class=polje><input type="text" name="address[]" placeholder="Address"><select class="podnaziva" name="podnaziva[]">\n\
<option value="WORK">WORK</option>\n\
<option value="HOME">HOME</option>\n\
<option value="OTHER">OTHER</option>\n\
<option value="CUSTOM">CUSTOM</option>\n\
</select><button class="xa" >X</button><br></div>'
       event.preventDefault();
       
       $( ".adrese" ).append(input);
       
       $(".xa").click(function(event) {

       event.preventDefault();
        $(this).parent().remove();
      });
      });
      $( ".dugme4" ).click(function(event) {
      var input;
      input='<div class=polje><input type="text" name="dates[]" placeholder="Date"><select class="podnazivd" name="podnazivd[]">\n\
<option value="BIRTHDAY">BIRTHDAY</option>\n\
<option value="ANNIVERSARY">ANNIVERSARY</option>\n\
<option value="OTHER">OTHER</option>\n\
<option value="CUSTOM">CUSTOM</option>\n\
</select><button class="xd" >X</button><br></div>'
       event.preventDefault();
       
       $( ".dates" ).append(input);
       
       $(".xd").click(function(event) {

       event.preventDefault();
        $(this).parent().remove();
      });
      });
});