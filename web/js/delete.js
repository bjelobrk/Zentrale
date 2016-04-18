$(document).ready(function(){

  $(".delete").click(function(){
      var path = " {{path('acme_centrala_delete')}}";
      $('form').attr('id','delete');
    $('form').attr('action', "/centrala/web/app_dev.php/delete");
     $("#delete").submit();
  
  });  
  
  $(".export").click(function(){
       var path = "{{ path('acme_centrala_export') }}";
      $('form').attr('id','export');
     $('form').attr('action', "/centrala/web/app_dev.php/export");
     $("#export").submit();
  
  });  
});