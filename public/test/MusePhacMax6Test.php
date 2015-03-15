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
    
  public function testMusicMajorGreaterThan8()
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
    $course6 = new Course();
    $course6->set("department","PHAC");
    $course6->set("courseTitle","Spring 2013");
    $student->set("courses",$course6);
    $course7 = new Course();
    $course7->set("department","PHAC");
    $course7->set("courseTitle","Fall 2013");
    $student->set("courses",$course7);
    $course8 = new Course();
    $course8->set("department","PHAC");
    $course8->set("courseTitle","Spring 2014");
    $student->set("courses",$course8);
    $course9 = new Course();
    $course9->set("department","PHAC");
    $course9->set("courseTitle","Fall 2014");
    $student->set("courses",$course9);
    $status = checkMusePhacMax($student);
    if(count($status["reason"]) == 9 && $status["result"] == false)
        $result = true;
    $this->assertEquals(true, $result);
  }
    
  public function testMusicMajorEquals8()
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
    $course6 = new Course();
    $course6->set("department","PHAC");
    $course6->set("courseTitle","Spring 2013");
    $student->set("courses",$course6);
    $course7 = new Course();
    $course7->set("department","PHAC");
    $course7->set("courseTitle","Fall 2013");
    $student->set("courses",$course7);
    $course8 = new Course();
    $course8->set("department","PHAC");
    $course8->set("courseTitle","Spring 2014");
    $student->set("courses",$course8);
    $status = checkMusePhacMax($student);
    if(count($status["reason"]) == 8 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }
    
  public function testKinesMajorGreaterThan8()
  {
    $result = false;
    $student = new StudentProfile();
    $student->set("major","Kinesiology");
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
    $course6 = new Course();
    $course6->set("department","PHAC");
    $course6->set("courseTitle","Spring 2013");
    $student->set("courses",$course6);
    $course7 = new Course();
    $course7->set("department","PHAC");
    $course7->set("courseTitle","Fall 2013");
    $student->set("courses",$course7);
    $course8 = new Course();
    $course8->set("department","PHAC");
    $course8->set("courseTitle","Spring 2014");
    $student->set("courses",$course8);
    $course9 = new Course();
    $course9->set("department","PHAC");
    $course9->set("courseTitle","Fall 2014");
    $student->set("courses",$course9);
    $course10 = new Course();
    $course10->set("department","PHAC");
    $course10->set("courseTitle","Spring 2015");
    $student->set("courses",$course10);
    $course11 = new Course();
    $course11->set("department","PHAC");
    $course11->set("courseTitle","Fall 2015");
    $student->set("courses",$course11);
    $status = checkMusePhacMax($student);
    if(count($status["reason"]) == 11 && $status["result"] == false)
        $result = true;
    $this->assertEquals(true, $result);
  }
    
  public function testKinesMajorEquals8()
  {
    $result = false;
    $student = new StudentProfile();
    $student->set("major","Kinesiology");
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
    $course6 = new Course();
    $course6->set("department","PHAC");
    $course6->set("courseTitle","Spring 2013");
    $student->set("courses",$course6);
    $course7 = new Course();
    $course7->set("department","PHAC");
    $course7->set("courseTitle","Fall 2013");
    $student->set("courses",$course7);
    $course8 = new Course();
    $course8->set("department","PHAC");
    $course8->set("courseTitle","Spring 2014");
    $student->set("courses",$course8);
    $course9 = new Course();
    $course9->set("department","PHAC");
    $course9->set("courseTitle","Fall 2014");
    $student->set("courses",$course9);
    $course10 = new Course();
    $course10->set("department","PHAC");
    $course10->set("courseTitle","Spring 2015");
    $student->set("courses",$course10);
    $status = checkMusePhacMax($student);
    if(count($status["reason"]) == 10 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }

}
