<?php
/*
 * run phpunit command from public folder
 * phpunit --bootstrap php/RequirementsChecker.php test/30004000Test.php
*/
require_once __DIR__."/../php/StudentProfile.php";
require_once __DIR__."/../php/Course.php";
require_once __DIR__."/../php/RequirementsChecker.php";

class nonfacultyCrhrsTest extends PHPUnit_Framework_TestCase
{
  public function testOneADCS()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","ADCS");
    $course->set("courseNumber",2000);
    $course->set("weight",3);
    $student->set("courses",$course);
    $status = checkNonfacultyCrhrs($student);
    $this->assertEquals(true, $status["result"]);
  }

  public function testOne13CrhrADCS()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","ADCS");
    $course->set("courseNumber",2000);
    $course->set("weight",13);
    $student->set("courses",$course);
    $status = checkNonfacultyCrhrs($student);
    $this->assertEquals(false, $status["result"]);
  }

  public function testThree6CrhrADCS()
  {
    $student = new StudentProfile();
    $course1 = new Course();
    $course2 = new Course();
    $course3 = new Course();
    $course1->set("department","ADCS");
    $course1->set("courseNumber",2000);
    $course1->set("weight",6);
    $course2->set("department","ADCS");
    $course2->set("courseNumber",2001);
    $course2->set("weight",6);
    $course3->set("department","ADCS");
    $course3->set("courseNumber",2002);
    $course3->set("weight",6);
    $student->set("courses",$course1);
    $student->set("courses",$course2);
    $student->set("courses",$course3);
    $status = checkNonfacultyCrhrs($student);
    $this->assertEquals(false, $status["result"]);
  }

  public function test13ChrhrMath()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","MATH");
    $course->set("courseNumber",2000);
    $course->set("weight",13);
    $student->set("courses",$course);
    $status = checkNonfacultyCrhrs($student);
    $this->assertEquals(true, $status["result"]);
  }

  public function testThree6CrhrCDEV()
  {
    $student = new StudentProfile();
    $course1 = new Course();
    $course2 = new Course();
    $course3 = new Course();
    $course1->set("department","CDEV");
    $course1->set("courseNumber",2000);
    $course1->set("weight",6);
    $course2->set("department","CDEV");
    $course2->set("courseNumber",2001);
    $course2->set("weight",6);
    $course3->set("department","CDEV");
    $course3->set("courseNumber",2002);
    $course3->set("weight",6);
    $student->set("courses",$course1);
    $student->set("courses",$course2);
    $student->set("courses",$course3);
    $status = checkNonfacultyCrhrs($student);
    $this->assertEquals(false, $status["result"]);
  }

  public function testThree6CrhrCRED()
  {
    $student = new StudentProfile();
    $course1 = new Course();
    $course2 = new Course();
    $course3 = new Course();
    $course1->set("department","CRED");
    $course1->set("courseNumber",2000);
    $course1->set("weight",6);
    $course2->set("department","CRED");
    $course2->set("courseNumber",2001);
    $course2->set("weight",6);
    $course3->set("department","CRED");
    $course3->set("courseNumber",2002);
    $course3->set("weight",6);
    $student->set("courses",$course1);
    $student->set("courses",$course2);
    $student->set("courses",$course3);
    $status = checkNonfacultyCrhrs($student);
    $this->assertEquals(false, $status["result"]);
  }

  public function testThree6CrhrEDUC()
  {
    $student = new StudentProfile();
    $course1 = new Course();
    $course2 = new Course();
    $course3 = new Course();
    $course1->set("department","EDUC");
    $course1->set("courseNumber",2000);
    $course1->set("weight",6);
    $course2->set("department","EDUC");
    $course2->set("courseNumber",2001);
    $course2->set("weight",6);
    $course3->set("department","EDUC");
    $course3->set("courseNumber",2002);
    $course3->set("weight",6);
    $student->set("courses",$course1);
    $student->set("courses",$course2);
    $student->set("courses",$course3);
    $status = checkNonfacultyCrhrs($student);
    $this->assertEquals(false, $status["result"]);
  }

  public function testThree6CrhrHLSC()
  {
    $student = new StudentProfile();
    $course1 = new Course();
    $course2 = new Course();
    $course3 = new Course();
    $course1->set("department","HLSC");
    $course1->set("courseNumber",2000);
    $course1->set("weight",6);
    $course2->set("department","HLSC");
    $course2->set("courseNumber",2001);
    $course2->set("weight",6);
    $course3->set("department","HLSC");
    $course3->set("courseNumber",2002);
    $course3->set("weight",6);
    $student->set("courses",$course1);
    $student->set("courses",$course2);
    $student->set("courses",$course3);
    $status = checkNonfacultyCrhrs($student);
    $this->assertEquals(false, $status["result"]);
  }

  public function testThree6CrhrMGT()
  {
    $student = new StudentProfile();
    $course1 = new Course();
    $course2 = new Course();
    $course3 = new Course();
    $course1->set("department","MGT");
    $course1->set("courseNumber",2000);
    $course1->set("weight",6);
    $course2->set("department","MGT");
    $course2->set("courseNumber",2001);
    $course2->set("weight",6);
    $course3->set("department","MGT");
    $course3->set("courseNumber",2002);
    $course3->set("weight",6);
    $student->set("courses",$course1);
    $student->set("courses",$course2);
    $student->set("courses",$course3);
    $status = checkNonfacultyCrhrs($student);
    $this->assertEquals(false, $status["result"]);
  }

  public function testThree6CrhrNURS()
  {
    $student = new StudentProfile();
    $course1 = new Course();
    $course2 = new Course();
    $course3 = new Course();
    $course1->set("department","NURS");
    $course1->set("courseNumber",2000);
    $course1->set("weight",6);
    $course2->set("department","NURS");
    $course2->set("courseNumber",2001);
    $course2->set("weight",6);
    $course3->set("department","NURS");
    $course3->set("courseNumber",2002);
    $course3->set("weight",6);
    $student->set("courses",$course1);
    $student->set("courses",$course2);
    $student->set("courses",$course3);
    $status = checkNonfacultyCrhrs($student);
    $this->assertEquals(false, $status["result"]);
  }

	public function testThree6CrhrPUBH()
  {
    $student = new StudentProfile();
    $course1 = new Course();
    $course2 = new Course();
    $course3 = new Course();
    $course1->set("department","PUBH");
    $course1->set("courseNumber",2000);
    $course1->set("weight",6);
    $course2->set("department","PUBH");
    $course2->set("courseNumber",2001);
    $course2->set("weight",6);
    $course3->set("department","PUBH");
    $course3->set("courseNumber",2002);
    $course3->set("weight",6);
    $student->set("courses",$course1);
    $student->set("courses",$course2);
    $student->set("courses",$course3);
    $status = checkNonfacultyCrhrs($student);
    $this->assertEquals(false, $status["result"]);
  }
  // if($department != "ADCS" && $department != "CDEV"&& $department != "CRED"
  //           && $department != "EDUC" && $department != "HLCS" && $department != "MGT"
  //           && $department != "NURS" && $department != "PUBH")
  //       {
  //         $courses[] = $course->toArray();
  //       }

}
