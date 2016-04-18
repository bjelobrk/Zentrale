$(document).ready(function(){
$("#search_results").slideUp();

$("#search_query").keyup(function(event){
event.preventDefault();
search_ajax_way();
});

});

function search_ajax_way(){
$("#search_results").show();
var search_this=$("#search_query").val();
$.post("/centrala/web/app_dev.php/ajax", {searchit : search_this}, function(data){
$("#display_results").html(data);

})
}