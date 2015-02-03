<?php
/*
 * run phpunit command from public folder
 * phpunit --bootstrap php/StudentProfile.php test/StudentProfileTest.php
*/

class StudentProfileTest extends PHPUnit_Framework_TestCase
{
   public function testAddName()
  {
    $s = new StudentProfile();
    $s->set("Sara");
    $this->assertEquals("Sara", $s->get());
  }
  
}