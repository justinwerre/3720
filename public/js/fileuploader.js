$(document).ready(function(){
  $("#filesubmitbutton").on("click",function(){
    var file_data = $("#fileinput").prop('files')[0];
    var form_data = new FormData(document.forms.namedItem("testForm"));
//    form_data.append('file', file_data);
    console.log(file_data);
//    var formData = new FormData($("#testForm"));
//    console.log(file_data);
    //probably a bad idea
    try{
      $.ajax({
        type: "POST",
        url: "/php/fileparser.php",
        data: {fuckyouchrome: file_data},
        cache: false,
        success: function(data, textStatus, jqXHR){
          console.log(data);
        }
      });
    }catch(e){
      console.log(e);
    }
  });
});
