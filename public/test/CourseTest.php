<?php
class CourseTest extends PHPUnit_Framework_TestCase
{
  // ...

  public function testGetDept()
  {
    $c = new Course();
    $this->assertEquals("CPSC", $c->get("department"));
  }

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
  // ...
}