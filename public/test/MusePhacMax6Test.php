<?php
/*
 * run phpunit command from public folder
 * phpunit --bootstrap php/RequirementsChecker.php test/MusePhacMax6Test.php
*/
require_once __DIR__."/../php/StudentProfile.php";
require_once __DIR__."/../php/Course.php";
require_once __DIR__."/../php/RequirementsChecker.php";

class MusePhacMaxCheckerTest extends PHPUnit_Framework_TestCase
{
  public function testMuse()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","MUSE");
    $student->set("courses",$course);
    $status = checkMusePhacMax($student);
    if(count($status["reason"]) == 1 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }

  public function testPhac()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","PHAC");
    $student->set("courses",$course);
    $status = checkMusePhacMax($student);
    if(count($status["reason"]) == 1 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }

  public function testGreaterThan4Activity()
  {
    $result = false;
    $student = new StudentProfile();
    $course1 = new Course();
    $course1->set("department","PHAC");
    $course1->set("courseTitle","Fall 2010");
    $student->set("courses",$course1);
    $course2 = new Course();
    $course2->set("department","MUSE");
    $course2->set("courseTitle","Spring 2010");
    $student->set("courses",$course2);
    $course3 = new Course();
    $course3->set("department","PHAC");
    $course3->set("courseTitle","Fall 2011");
    $student->set("courses",$course3);
    $course4 = new Course();
    $course4->set("department","MUSE");
    $course4->set("courseTitle","Spring 2011");
    $student->set("courses",$course4);
    $course5 = new Course();
    $course5->set("department","PHAC");
    $course5->set("courseTitle","Fall 2012");
    $student->set("courses",$course5);
    $status = checkMusePhacMax($student);
    if(count($status["reason"]) == 5 && $status["result"] == false)
        $result = true;
    $this->assertEquals(true, $result);
  }
    
  public function test4Activity()
  {
    $result = false;
    $student = new StudentProfile();
    $course1 = new Course();
    $course1->set("department","PHAC");
    $course1->set("courseTitle","Fall 2010");
    $student->set("courses",$course1);
    $course2 = new Course();
    $course2->set("department","MUSE");
    $course2->set("courseTitle","Spring 2010");
    $student->set("courses",$course2);
    $course3 = new Course();
    $course3->set("department","PHAC");
    $course3->set("courseTitle","Fall 2011");
    $student->set("courses",$course3);
    $course4 = new Course();
    $course4->set("department","MUSE");
    $course4->set("courseTitle","Spring 2011");
    $student->set("courses",$course4);
    $status = checkMusePhacMax($student);
    if(count($status["reason"]) == 4 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }

  public function testNonMuseNorPhac()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","MATH");
    $student->set("courses",$course);
    $status = checkMusePhacMax($student);
    if(count($status["reason"]) == 0 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }
    
  public function testMusicMajor()
  {
    $result = false;
    $student = new StudentProfile();
    $student->set("major","Music");
    $course1 = new Course();
    $course1->set("department","PHAC");
    $course1->set("courseTitle","Fall 2010");
    $student->set("courses",$course1);
    $course2 = new Course();
    $course2->set("department","MUSE");
    $course2->set("courseTitle","Spring 2010");
    $student->set("courses",$course2);
    $course3 = new Course();
    $course3->set("department","PHAC");
    $course3->set("courseTitle","Fall 2011");
    $student->set("courses",$course3);
    $course4 = new Course();
    $course4->set("department","MUSE");
    $course4->set("courseTitle","Spring 2011");
    $student->set("courses",$course4);
    $course5 = new Course();
    $course5->set("department","PHAC");
    $course5->set("courseTitle","Fall 2012");
    $student->set("courses",$course5);
    $status = checkMusePhacMax($student);
    if(count($status["reason"]) == 7 && $status["result"] == false)
        $result = true;
    $this->assertEquals(true, $result);
  }

}
