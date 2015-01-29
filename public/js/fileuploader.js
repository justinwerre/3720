$(document).ready(function(){
  $("button").on("click",function(){
    var file = $("#fileinput").val();
    $.ajax({
      type: "POST",
      url: "/php/fileparser.php",
      data: {file: file},
      cache: false,
      success: function(responce){
        alert("it worked");
      }
    });
  });
});
