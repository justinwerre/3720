<?php
/*
 * run phpunit command from public folder
 * phpunit --bootstrap php/RequirementsChecker.php test/RequirementsCheckerTest.php
*/
require_once "/vagrant/public/php/StudentProfile.php";

class RequirementsCheckerTest extends PHPUnit_Framework_TestCase
{
  public function testGPAGreaterThanTwo()
  {
    $student = new StudentProfile();
    $student->set("GPA", 3.99);
    $this->assertEquals(true, checkGPA($student));
  }
  
  public function testGPAlessThantwo()
  {
    $student = new StudentProfile();
    $student->set("GPA", 1.0);
    $this->assertEquals(false, checkGPA($student));
  }
}