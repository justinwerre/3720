<?php
class CourseTest extends PHPUnit_Framework_TestCase
{
  // ...

  public function testGetDept()
  {
    $c = new Course();
    $this->assertEquals("CPSC", $c->get("Dept"));
  }

  
  // ...
}