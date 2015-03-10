<?php
/*
 * run phpunit command from public folder
 * phpunit --bootstrap php/Course.php test/CourseTest.php
*/
require_once "/vagrant/public/php/Course.php";

class CourseTest extends PHPUnit_Framework_TestCase
{
  public function testSetDept()
  {
    $c = new Course();
    $c->set("department","MATH");
    $this->assertEquals("MATH", $c->get("department"));
  }
  
  public function testSetCourseNumber()
  {
    $c = new Course();
    $c->set("courseNumber","1000");
    $this->assertEquals("1000", $c->get("courseNumber"));
  }
  
  public function testSetCourseTitle()
  {
    $c = new Course();
    $c->set("courseTitle","Intro to Computer Science");
    $this->assertEquals("Intro to Computer Science", $c->get("courseTitle"));
  }
  
  public function testSetWeight()
  {
    $c = new Course();
    $c->set("weight","3");
    $this->assertEquals("3", $c->get("weight"));
  }
  
  public function testSetTotalPoints()
  {
    $c = new Course();
    $c->set("totalPoints","12");
    $this->assertEquals("12", $c->get("totalPoints"));
  }
}