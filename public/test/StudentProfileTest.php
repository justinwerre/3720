<?php
/*
 * run phpunit command from public folder
 * phpunit --bootstrap php/StudentProfile.php test/StudentProfileTest.php
*/
require_once __DIR__."/../php/Course.php";
class StudentProfileTest extends PHPUnit_Framework_TestCase
{
  public function testAddName()
  {
    $s = new StudentProfile();
    $s->set("name","Sara");
    $this->assertEquals("Sara", $s->get("name"));
  }
  public function testAddFaculty()
  {
    $s = new StudentProfile();
    $s->set("faculty","Arts and Science");
    $this->assertEquals("Arts and Science", $s->get("faculty"));
  }
  public function testAddProgramDoesntChangeFaculty()
  {
    $s = new StudentProfile();
    $s->set("faculty","Arts and Science");
    $s->set("program","Giraffe Mgmt");
    $this->assertEquals("Arts and Science", $s->get("faculty"));
  }
  public function testAddMajor()
  {
    $s = new StudentProfile();
    $s->set("major","Table Assembly");
    $this->assertEquals("Table Assembly", $s->get("major"));
  }
  public function testAddCourse()
  {
    $c = new Course();
    $c->set("department","MATH");
    $s = new StudentProfile();
    $s->set("courses",$c);
    $r = $s->get("courses");
    $this->assertEquals("MATH", $r[0]->get("department"));
  }
  public function testAddCreditHours()
  {
    $s = new StudentProfile();
    $s->set("creditHours",97);
    $this->assertEquals(97, $s->get("creditHours"));
  }
  public function testAddGPA()
  {
    $s = new StudentProfile();
    $s->set("GPA",3.0);
    $this->assertEquals(3.0, $s->get("GPA"));
  }
  public function testAddMultipleCourses()
  {
    $c1 = new Course();
    $c2 = new Course();
    $c1->set("department","MATH");
    $c2->set("department","CPSC");
    $s = new StudentProfile();
    $s->set("courses",$c1);
    $s->set("courses",$c2);
    $r = $s->get("courses");
    $this->assertEquals("MATH", $r[0]->get("department"));
    $this->assertEquals("CPSC", $r[1]->get("department"));
  }
}