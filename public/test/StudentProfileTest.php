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
  
}