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
        //loop through all student profiles

				$.each(response, function(index, value){
          // create a report for the user
          $report.append(nameReport(value.studentProfile));
          $report.append(facultyReport(value.studentProfile));
          $report.append(majorReport(value.studentProfile));
          $report.append(programReport(value.studentProfile));
          $report.append(GPAReport(value.gradCheck));
          $report.append(creditHoursReport(value.gradCheck));
          $report.append(oneThousandsReport(value.gradCheck));
          $report.append(threeThousandsFourThousandsReport(value.gradCheck));
          $report.append(nonFacultyCrhrsReport(value.gradCheck));
          $report.append(maxActivityCreditHoursReport(value.gradCheck));
          $report.append(maxAppliedStudyCreditHoursReport(value.gradCheck));
          $report.append(max24DisciplineReport(value.gradCheck));
					econTests(value, $report);
				});
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
      var dept = $("<td />", {text: value.department});
      var crsNmb = $("<td />", {text: value.courseNumber});
       var crsTitle = $("<td />", {text: value.courseTitle});
       if(value.weight<1){
        crsTitle = $("<td />", {text:"In Progress"});
       }
       returnArray.push($("<tr />", {
        class: "info",
        append: Array(dept, crsNmb, crsTitle)
      }));
    });
  }
  
  return returnArray;
}

//creates table row for non faculty crhrs report
function nonFacultyCrhrsReport(response){
  var header = $("<td />", {text: "Non faculty credit hours:"});
  var result = $("<td />", {text: response.nonfacultyCrhrs.result?"Pass":"Fail"});
  var reason = $("<td />", {text: response.nonfacultyCrhrs.reason+" non faculty credit hours"});
  var returnArray = new Array($("<tr />",{
      class: response.nonfacultyCrhrs.result?"success":"danger",
      append: Array(header, result, reason)
    })
  );
  
  if(!response.nonfacultyCrhrs.result || true){
    $.each(response.nonfacultyCrhrs.reason, function(name, value){
      console.log(value);
      var dept = $("<td />", {text: value.department});
      var crsNmb = $("<td />", {text: value.courseNumber});
      var crsTitle = $("<td />", {text: value.courseTitle});
      if(value.weight<1){
        crsTitle = $("<td />", {text:"In Progress"});
      }
      returnArray.push($("<tr />", {
        class: "info",
        append: Array(dept, crsNmb, crsTitle)
      }));
    });
  }
  
  return returnArray;
}

//creates table row for max activity courses report
function maxActivityCreditHoursReport(response){
  var header = $("<td />", {text: "Activity credit hours:"});
  var result = $("<td />", {text: response.maxActivityCreditHours.result?"Pass":"Fail"});
  var reason = $("<td />", {text: response.maxActivityCreditHours.reason.length * 1.5 +" activity course credit hours"});
  var returnArray = new Array($("<tr />",{
      class: response.maxActivityCreditHours.result?"success":"danger",
		  append: Array(header, result, reason)
    })
  );
  return returnArray;
}

//creates table row for max applied studies courses report
function maxAppliedStudyCreditHoursReport(response){
  var header = $("<td />", {text: "Applied studies credit hours:"});
  var result = $("<td />", {text: response.maxAppliedStudyCreditHours.result?"Pass":"Fail"});
  var reason = $("<td />", {text: response.maxAppliedStudyCreditHours.reason.length * 3 +" applied studies course credit hours"});
  var returnArray = new Array($("<tr />",{
      class: response.maxAppliedStudyCreditHours.result?"success":"danger",
		  append: Array(header, result, reason)
    })
  );
  return returnArray;
}

//creates table row for max 24 courses in any one discipline report
function max24DisciplineReport(response){
  var header = $("<td />", {text: "Most taken discipline credit hours:"});
  var result = $("<td />", {text: response.max24Discipline.result?"Pass":"Fail"});
  var reason = $("<td />", {text: response.max24Discipline.reason.length * 3 +" credit hours in discipline "+ response.max24Discipline.dept});
  var returnArray = new Array($("<tr />",{
      class: response.max24Discipline.result?"success":"danger",
		  append: Array(header, result, reason)
    })
  );
  return returnArray;
}
		
// checks to see if the student is a economics major and reports 
// additinal test results specific to that major
function econTests(studentInfo, $report){
	if(studentInfo.studentProfile.major == "Economics"){
		$report.append(econFourThousands(studentInfo.gradCheck.fourThousands));
		$report.append(econNumberOfCourses(studentInfo.gradCheck.classes));
	}
}

function econFourThousands(results){
	var header = $("<td />", {text: "Economics Four Thousands Taken:"});
	var result = $("<td />", {text: results.result?"Pass":"Fail"});
  var reason = $("<td />", {text: results.reason.length+" 4000 courses"});
  var returnArray = new Array($("<tr />",{
      class: results.result?"success":"danger",
      append: Array(header, result, reason)
    })
  );

  if(!results.result || true){
    $.each(results.reason, function(name, value){
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

function econNumberOfCourses(results){
	var header = $("<td />", {text: "Economics Classes Taken:"});
	var result = $("<td />", {text: results.result?"Pass":"Fail"});
  var reason = $("<td />", {text: results.reason.length+" courses"});
  var returnArray = new Array($("<tr />",{
      class: results.result?"success":"danger",
      append: Array(header, result, reason)
    })
  );

  if(!results.result || true){
    $.each(results.reason, function(name, value){
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