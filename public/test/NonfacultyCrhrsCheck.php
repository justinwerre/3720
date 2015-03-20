<?php
/*
 * run phpunit command from public folder
 * phpunit --bootstrap php/RequirementsChecker.php test/NonfacultyCrhrsCheck.php
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

  public function testOneOfEachNonfaculty2crhr()
  {
    $student = new StudentProfile();
    $course1 = new Course();
    $course2 = new Course();
    $course3 = new Course();
    $course4 = new Course();
    $course5 = new Course();
    $course6 = new Course();
    $course7 = new Course();
    $course8 = new Course();
    $course1->set("department","ADCS");
    $course1->set("courseNumber",2000);
    $course1->set("weight",2);
    $course2->set("department","CDEV");
    $course2->set("courseNumber",2001);
    $course2->set("weight",2);
    $course3->set("department","CRED");
    $course3->set("courseNumber",2002);
    $course3->set("weight",2);
    $course4->set("department","EDUC");
    $course4->set("courseNumber",2002);
    $course4->set("weight",2);
    $course5->set("department","HLCS");
    $course5->set("courseNumber",2002);
    $course5->set("weight",2);
    $course6->set("department","MGT");
    $course6->set("courseNumber",2002);
    $course6->set("weight",2);
    $course7->set("department","NURS");
    $course7->set("courseNumber",2002);
    $course7->set("weight",2);
    $course8->set("department","PUBH");
    $course8->set("courseNumber",2002);
    $course8->set("weight",2);
    $student->set("courses",$course1);
    $student->set("courses",$course2);
    $student->set("courses",$course3);
    $student->set("courses",$course4);
    $student->set("courses",$course5);
    $student->set("courses",$course6);
    $student->set("courses",$course7);
    $student->set("courses",$course8);
    $status = checkNonfacultyCrhrs($student);
    $this->assertEquals(false, $status["result"]);
  }
  
  public function testOneOfEachNonfaculty1crhr()
  {
    $student = new StudentProfile();
    $course1 = new Course();
    $course2 = new Course();
    $course3 = new Course();
    $course4 = new Course();
    $course5 = new Course();
    $course6 = new Course();
    $course7 = new Course();
    $course8 = new Course();
    $course1->set("department","ADCS");
    $course1->set("courseNumber",2000);
    $course1->set("weight",1);
    $course2->set("department","CDEV");
    $course2->set("courseNumber",2001);
    $course2->set("weight",1);
    $course3->set("department","CRED");
    $course3->set("courseNumber",2002);
    $course3->set("weight",1);
    $course4->set("department","EDUC");
    $course4->set("courseNumber",2002);
    $course4->set("weight",1);
    $course5->set("department","HLCS");
    $course5->set("courseNumber",2002);
    $course5->set("weight",1);
    $course6->set("department","MGT");
    $course6->set("courseNumber",2002);
    $course6->set("weight",1);
    $course7->set("department","NURS");
    $course7->set("courseNumber",2002);
    $course7->set("weight",1);
    $course8->set("department","PUBH");
    $course8->set("courseNumber",2002);
    $course8->set("weight",1);
    $student->set("courses",$course1);
    $student->set("courses",$course2);
    $student->set("courses",$course3);
    $student->set("courses",$course4);
    $student->set("courses",$course5);
    $student->set("courses",$course6);
    $student->set("courses",$course7);
    $student->set("courses",$course8);
    $status = checkNonfacultyCrhrs($student);
    $this->assertEquals(true, $status["result"]);
  }

  public function testThree6CrhrECON()
  {
    $student = new StudentProfile();
    $course1 = new Course();
    $course2 = new Course();
    $course3 = new Course();
    $course1->set("department","ECON");
    $course1->set("courseNumber",2000);
    $course1->set("weight",6);
    $course2->set("department","ECON");
    $course2->set("courseNumber",2001);
    $course2->set("weight",6);
    $course3->set("department","ECON");
    $course3->set("courseNumber",2002);
    $course3->set("weight",6);
    $student->set("courses",$course1);
    $student->set("courses",$course2);
    $student->set("courses",$course3);
    $status = checkNonfacultyCrhrs($student);
    $this->assertEquals(true, $status["result"]);
  }
    
  public function testHlsc3450()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","HLSC");
    $course->set("courseNumber",3450);
    $course->set("weight",3);
    $student->set("courses",$course);
    $status = checkNonfacultyCrhrs($student);
    if($status["result"] == true && count($status["reason"]) == 0)
        $result = true;
    $this->assertEquals(true, $result);
  }
    
  public function testMgt3780()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","HLSC");
    $course->set("courseNumber",3780);
    $course->set("weight",3);
    $student->set("courses",$course);
    $status = checkNonfacultyCrhrs($student);
    if($status["result"] == true && count($status["reason"]) == 0)
        $result = true;
    $this->assertEquals(true, $result);
  }
}
