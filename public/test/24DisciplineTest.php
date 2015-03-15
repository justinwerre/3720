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

}
