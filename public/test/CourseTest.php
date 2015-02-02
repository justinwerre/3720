<?php
class CourseTest extends PHPUnit_Framework_TestCase
{
  // ...

  public function testGetDept()
  {
    $c = new Course();
    $this->assertEquals("CPSC", $c->get("dept"));
  }

  public function testSetDept()
  {
    $c = new Course();
    $c->set("dept","MATH");
    $this->assertEquals("MATH", $c->get("dept"));
  }
  // ...
}