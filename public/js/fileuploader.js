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
        $report.append(nameReport(response.studentProfile));
        $report.append(facultyReport(response.studentProfile));
        $report.append(majorReport(response.studentProfile));
        $report.append(programReport(response.studentProfile));
        $report.append(GPAReport(response.gradCheck));
        $report.append(creditHoursReport(response.gradCheck));
        $report.append(oneThousandsReport(response.gradCheck));
        $report.append(threeThousandsFourThousandsReport(response.gradCheck));
      } 
    });
  });
});

// creates a table row for student name
function nameReport(response){
  var header = $("<td />", {text: "Student name:"});
  var name = $("<td />", {text: response.name});
  return $("<tr />",{
    append: Array(header, name)
  });
}

// creates a table row for faculty
function facultyReport(response){
  var header = $("<td />", {text: "Faculty:"});
  var faculty = $("<td />", {text: response.faculty});
  return $("<tr />",{
    append: Array(header, faculty)
  });
}

// creates a table row for major
function majorReport(response){
  var header = $("<td />", {text: "Major:"});
  var major = $("<td />", {text: response.major});
  return $("<tr />",{
    append: Array(header, major)
  });
}

// creates a table row for program
function programReport(response){
  var header = $("<td />", {text: "Program:"});
  var program = $("<td />", {text: response.program});
  return $("<tr />",{
    append: Array(header, program)
  });
}

// creates a table row for the GPA requirement check
function GPAReport(response){
  var header = $("<td />", {text: "GPA test:"});
  var result = $("<td />", {text: response.GPA.result?"Pass":"Fail"});
  var reason = $("<td />", {text: response.GPA.reason+" gpa"});
  return $("<tr />", {
    class: response.GPA.result?"success":"danger",
    append: Array(header, result, reason)
  });
} 

function creditHoursReport(response){
  var header = $("<td />", {text: "Credit Hours:"});
  var result = $("<td />", {text: response.creditHours.result?"Pass":"Fail"});
  var reason = $("<td />", {text: response.creditHours.reason+" credit hours"});
  return $("<tr />", {
    class: response.creditHours.result?"success":"danger",
    append: Array(header, result, reason)
  });
}

function oneThousandsReport(response){
  var header = $("<td />", {text: "1000 courses:"});
  var result = $("<td />", {text: response.oneThousands.result?"Pass":"Fail"});
  var reason = $("<td />", {text: response.oneThousands.reason.length+" 1000 courses"});
  var returnArray = new Array($("<tr />",{
      class: response.oneThousands.result?"success":"danger",
      append: Array(header, result, reason)
    })
  );
  
  if(!response.oneThousands.result || true){
    $.each(response.oneThousands.reason, function(name, value){
      console.log(value);
      var dept = $("<td />", {text: value.department});
      var crsNmb = $("<td />", {text: value.courseNumber});
      var crsTitle = $("<td />", {text: value.courseTitle});
      returnArray.push($("<tr />", {
        class: "info",
        append: Array(dept, crsNmb, crsTitle)
      }));
    });
  }
  
  return returnArray;
}
//creates table row for 3000/4000 check
function threeThousandsFourThousandsReport(response){
  var header = $("<td />", {text: "3000/4000 courses:"});
  var result = $("<td />", {text: response.threeThousandsFourThousands.result?"Pass":"Fail"});
  var reason = $("<td />", {text: response.threeThousandsFourThousands.reason.length+" 3000/4000 courses"});
  var returnArray = new Array($("<tr />",{
      class: response.threeThousandsFourThousands.result?"success":"danger",
      append: Array(header, result, reason)
    })
  );
  
  if(!response.threeThousandsFourThousands.result || true){
    $.each(response.threeThousandsFourThousands.reason, function(name, value){
      console.log(value);
      var dept = $("<td />", {text: value.department});
      var crsNmb = $("<td />", {text: value.courseNumber});
      var crsTitle = $("<td />", {text: value.courseTitle});
      returnArray.push($("<tr />", {
        class: "info",
        append: Array(dept, crsNmb, crsTitle)
      }));
    });
  }
  
  return returnArray;
}
