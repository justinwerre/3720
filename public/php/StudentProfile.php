<?php
  class StudentProfile
  {
    private $name;
    private $courses;
    private $faculty;
    private $program;
    private $major;

    public function __construct()
    {
      $this->name = "";
      $this->faculty = "";
      $this->program = "";
      $this->major = "";
      $this->courses = array();
    }
    /*
    get() works with the following properties:
    name, faculty, program, major, courses
    */
    public function set($property,$newValue)
    {
      switch ($property)
      {
        case "name":
          $this->name = $newValue;
          break;
        case "faculty":
          $this->faculty = $newValue;
          break;
        case "program":
          $this->program = $newValue;
          break;
        case "major":
          $this->major = $newValue;
          break;
        case "courses":
          $this->courses[] = $newValue;
          break;
      }
    }
    /*
    set() works with the following properties:
    name, faculty, program, major, course
    */
    public function get($property)
    {
      $returnValue = "";
      switch ($property)
      {
        case "name":
          $returnValue = $this->name;
          break;
        case "faculty":
          $returnValue = $this->faculty;
          break;
        case "program":
          $returnValue = $this->program;
          break;
        case "major":
          $returnValue = $this->major;
          break;
        case "courses":
          $returnValue = $this->courses;
          break;
      }
      return $returnValue;
    }

    public function __destruct()
    {
     
    }

  }
 
?>
