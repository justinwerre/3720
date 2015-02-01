$(document).ready(function(){
  $("#filesubmitbutton").on("click", function(){
    var fileSelect = document.getElementById("fileinput");
    var files = fileSelect.files;
    var lis = files[0];
    var formData = new FormData();
    formData.append("file", lis, lis.name);
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/php/jsdev.php", true);
    
    xhr.onload = function(){
      if(xhr.status === 200){
        console.log("success", xhr.responseText);
      }else{
        console.log("problems");
      }
    };
    
    $.ajax({
      type: "POST",
      url: "/php/jsdev.php",
      
    });
    
    xhr.send(formData);
    
  });
});
