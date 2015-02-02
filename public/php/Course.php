<?php
  class Course
  {
    private $dept;
    private $courseNumber;
    private $courseTitle;
    private $weight;
    private $totalPoints;

    public function __construct()
    {
        
    }

    public function get($property)
    {
      return "CPSC";
    }

    public function set($newval)
    {
        //$this->prop1 = $newval;
    }

    public function __destruct()
    {
     
    }

  }
 
?>
