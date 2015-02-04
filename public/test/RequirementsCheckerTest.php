<?php
/*
 * run phpunit command from public folder
 * phpunit --bootstrap php/RequirementsChecker.php test/RequirementsCheckerTest.php
*/
require_once "/vagrant/public/php/StudentProfile.php";
require_once "/vagrant/public/php/Course.php";

class RequirementsCheckerTest extends PHPUnit_Framework_TestCase
{
  public function testGPAGreaterThanTwo()
  {
    $student = new StudentProfile();
    $student->set("GPA", 3.99);
    $this->assertEquals(true, checkGPA($student));
  }
  
  public function testGPAlessThanTwo()
  {
    $student = new StudentProfile();
    $student->set("GPA", 1.0);
    $this->assertEquals(false, checkGPA($student));
  }
  
  public function testGPAEqualsTwo()
  {
    $student = new StudentProfile();
    $student->set("GPA", 2.0);
    $this->assertEquals(true, checkGPA($student));
  }
  
  public function testCreditHoursGreaterThan120()
  {
    $student = new StudentProfile();
    $student->set("creditHours", 121);
    $this->assertEquals(true, checkCreditHours($student));
  }
  
  public function testCreditHoursLessThan120()
  {
    $student = new StudentProfile();
    $student->set("creditHours", 119);
    $this->assertEquals(false, checkCreditHours($student));
  }
  
  public function testCreditHoursEquals120()
  {
    $student = new StudentProfile();
    $student->set("creditHours", 120);
    $this->assertEquals(true, checkCreditHours($student));
  }
  
  public function test1000ClassesLessThan12()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department", "MATH");
    $student->set("courses", $course);
    $this->assertEquals(true, check1000Classes($student));
  }
}
