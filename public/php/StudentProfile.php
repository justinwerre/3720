<?php
  class StudentProfile
  {
    private $name;
    private $courses;
    private $faculty;
    private $program;
    private $major;
    private $creditHours;
    private $GPA;

    public function __construct()
    {
      $this->name = "";
      $this->faculty = "";
      $this->program = "";
      $this->major = "";
      $this->courses = array();
      $this->creditHours = 0;
      $this->GPA = 0.0;
    }
    /*
    get() works with the following properties:
    name, faculty, program, major, courses, creditHours
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
        case "creditHours":
          $this->creditHours = $newValue;
          break;
        case "GPA":
          $this->GPA = $newValue;
          break;
      }
    }
    /*
    set() works with the following properties:
    name, faculty, program, major, course, creditHours
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
        case "creditHours":
          $returnValue = $this->creditHours;
          break;
        case "GPA":
          $returnValue = $this->GPA;
          break;
      }
      return $returnValue;
    }

    public function __destruct()
    {
     
    }

  }
 
?>
