// Creates an onclick event handler to upload files to the server
$(document).ready(function(){
  $("#filesubmitbutton").on("click", function(){
    var lis = $("#fileinput").get(0).files[0];
    var formData = new FormData();
    formData.append("file", lis, lis.name);

    // send the form off to the server
    $.ajax({
      type: "POST",
      url: "/php/jsdev.php",
      contentType: false, // don't add a content type header
      processData: false, // jquery doesn't need to proccess the file
      data: formData,
      success: function(response, textStatus, jqXHR){
        // clear out the old server responce
        $("#report").remove();
        
        // show the new server response
        $("<div />",{
          appendTo: $("body"),
          id: "report",
          html: response
        });
      } 
    });
  });
});
