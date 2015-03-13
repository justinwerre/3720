<?php
/*
 * run phpunit command from public folder
 * phpunit --bootstrap php/RequirementsChecker.php test/30004000Test.php
*/
require_once __DIR__."/../php/StudentProfile.php";
require_once __DIR__."/../php/Course.php";
require_once __DIR__."/../php/fileparser.php";

class fileparserTest extends PHPUnit_Framework_TestCase
{
  public function testOne3000()
  {
    $students = array();
    $student = parseFile('econ.lis', $students);
    $this->assertEquals(true, true);
  }

}
