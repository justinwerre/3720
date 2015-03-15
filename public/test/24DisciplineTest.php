<?php
/*
 * run phpunit command from public folder
 * phpunit --bootstrap php/RequirementsChecker.php test/24DisciplineTest.php
*/
require_once __DIR__."/../php/StudentProfile.php";
require_once __DIR__."/../php/Course.php";
require_once __DIR__."/../php/RequirementsChecker.php";

class max24DisciplineCheckerTest extends PHPUnit_Framework_TestCase
{
    //detects a course of any department
  public function testOneDiscipline()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","MUSE");
    $student->set("courses",$course);
    $status = check24Discipline($student);
    if(count($status["reason"]) == 1 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }
    
    //passes with no courses
  public function testZeroDiscipline()
  {
    $result = false;
    $student = new StudentProfile();
    $status = check24Discipline($student);
    if(count($status["reason"]) == 0 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }
    
    //detects that there are two different disciplines
  public function testTwoDisciplines()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","MUSI");
    $student->set("courses",$course);
    $course2 = new Course();
    $course2->set("department","MUSE");
    $student->set("courses",$course2);
    $status = check24Discipline($student);
    if(count($status["reason"]) == 1 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }

    //detects that there are two disciplines, and counts the correct amount of courses in the returned array
  public function testTwoDisciplinesDiffAmtCourses()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","MUSI");
    $student->set("courses",$course);
    $course2 = new Course();
    $course2->set("department","MUSE");
    $student->set("courses",$course2);
    $course3 = new Course();
    $course3->set("department","MUSE");
    $course3->set("courseTitle","MUSE");
    $student->set("courses",$course3);
    $status = check24Discipline($student);
    if(count($status["reason"]) == 2 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }

    //detects that there are two disciplines, and counts the correct amount of courses in the returned array, opposite(swapped) disciplines
  public function testTwoDisciplinesDiffAmtSwap()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","MUSE");
    $student->set("courses",$course);
    $course2 = new Course();
    $course2->set("department","MUSI");
    $student->set("courses",$course2);
    $course3 = new Course();
    $course3->set("department","MUSI");
    $course3->set("courseTitle","MUSE");
    $student->set("courses",$course3);
    $status = check24Discipline($student);
    if(count($status["reason"]) == 2 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }

    //detects that there are many(too many to predict) disciplines, and counts the correct amount of courses in the returned array
  public function testManyDisciplinesDiffAmt()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","MUSE");
    $student->set("courses",$course);
    $course2 = new Course();
    $course2->set("department","MUSI");
    $student->set("courses",$course2);
    $course3 = new Course();
    $course3->set("department","MUSI");
    $course3->set("courseTitle","MUSE");
    $student->set("courses",$course3);
    $course4 = new Course();
    $course4->set("department","CPSC");
    $student->set("courses",$course4);
    $course5 = new Course();
    $course5->set("department","CPSC");
    $course5->set("courseTitle","MUSI");
    $student->set("courses",$course5);
    $course6 = new Course();
    $course6->set("department","CPSC");
    $course6->set("courseTitle","MUSE");
    $student->set("courses",$course6);
    $status = check24Discipline($student);
    if(count($status["reason"]) == 3 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }
    
    //detects 24 courses in one department and results to true
  public function testOneDiscipline24Courses()
  {
    $result = false;
    $student = new StudentProfile();
    for($i = 0; $i < 24; ++$i)
    {
      $course = new Course();
      $course->set("department","MATH");
      $course->set("courseNumber",$i);
      $student->set("courses",$course);
    }
    $status = check24Discipline($student);
    if(count($status["reason"]) == 24 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }
    
    //detects 25 courses in one department and results to false
  public function testOneDiscipline25Courses()
  {
    $result = false;
    $student = new StudentProfile();
    for($i = 0; $i < 25; ++$i)
    {
      $course = new Course();
      $course->set("department","MATH");
      $course->set("courseNumber",$i);
      $student->set("courses",$course);
    }
    $status = check24Discipline($student);
    if(count($status["reason"]) == 25 && $status["result"] == false)
        $result = true;
    $this->assertEquals(true, $result);
  }
    
    //returns the correct name of discipline
  public function testDisciplineNameReturn()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","MUSI");
    $student->set("courses",$course);
    $course2 = new Course();
    $course2->set("department","MUSI");
    $course2->set("courseTitle","MUSE");
    $student->set("courses",$course2);
    $course3 = new Course();
    $course3->set("department","MUSE");
    $student->set("courses",$course3);
    $status = check24Discipline($student);
    if(count($status["reason"]) == 2 && $status["result"] == true && $status["dept"] == "MUSI")
        $result = true;
    $this->assertEquals(true, $result);
  }
    
}
