// Creates an onclick event handler to upload files to the server
$(document).ready(function(){
  $("#filesubmitbutton").on("click", function(){
    var lis = $("#fileinput").get(0).files[0];
    var formData = new FormData();
    formData.append("file", lis, lis.name);

    // send the form off to the server
    $.ajax({
      type: "POST",
      url: "/php/GradCheck.php",
      contentType: false, // don't add a content type header
      processData: false, // jquery doesn't need to proccess the file
      data: formData,
      success: function(response, textStatus, jqXHR){
        // clear out the old server responce
        var $report = $("#report").empty();
        console.log(response);
        
        // create a report for the user
       $report.append(GPAReport(response));
      } 
    });
  });
});

function GPAReport(response){
  var header = $("<td />", {text: "GPA test:"});
  var result = $("<td />", {text: response.GPA.result?"Pass":"fail"});
  var reason = $("<td />", {text: response.GPA.reason+" gpa"});
  return $("<tr />").append(header).append(result).append(reason);
}