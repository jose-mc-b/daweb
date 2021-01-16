
/*$(document).ready(function (){
    $(".hidden_images").each(function (){
        let id= $(this).attr("id");
        let imagenes = $("#"+ id).val().split(",");
        let imagen="<img src='/uploads/" + imagenes[0] +
             "' alt='imagen' width='300' height='300'>";
        $("#divImages_" + id).append(imagen);
    });

});*/


$(document).ready(function (){
    var carousel= "";
     
     $(".hidden_images").each(
    function (){
        let id= $(this).attr("id");
              carousel="<div id=\"carousel"
              +id+
              "\" class=\"carousel slide\" data-ride=\"\">\r\n  <div class=\"carousel-inner\">\r\n ";

         let imagenes = $("#"+ id).val().split(",");
       
         $.each(imagenes,
            function( index, value ) {
                let carousel_item="";
           if (index===0) { 
        carousel_item= "   <div class=\"carousel-item active\">\r\n      <img class=\"d-block w-100\" src=\"/uploads/"
        + imagenes[index]+
        "\" alt=\""+ index+"slide\" height=\"200\">\r\n    <\/div>\r\n "
    }

            else {
                 carousel_item=" <div class=\"carousel-item\">\r\n      <img class=\"d-block w-100\" src=\"/uploads/"
                 + imagenes[index]+
                 "\" alt=\"slide\" height=\"200\" >\r\n    <\/div>\r\n ";
            }
             
           
            carousel+= carousel_item;
           carousel_item="";
    
         }
    );
        console.log('ESte es el producto'+id);
       carousel+=" </div><a class=\"carousel-control-prev\" href=\"#carousel"+
       id 
       +"\" role=\"button\" data-slide=\"prev\">\r\n    <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"><\/span>\r\n    <span class=\"sr-only\">Previous<\/span>\r\n  <\/a>\r\n  <a class=\"carousel-control-next\" href=\"#carousel"+
       id 
       +"\" role=\"button\" data-slide=\"next\">\r\n    <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"><\/span>\r\n    <span class=\"sr-only\">Next<\/span>\r\n  <\/a>\r\n<\/div>";    
      $("#divImages_" + id).append(carousel);
		
    }
  
    );}
);
