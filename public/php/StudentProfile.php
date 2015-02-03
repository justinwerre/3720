<?php
  class StudentProfile
  {
    private $name;
    private $classes;
    private $faculty;
    private $program;
    private $major;

    public function __construct()
    {
      $this->name = "";
      $this->faculty = "";
      $this->program = "";
      $this->major = "";
      
    }
    /*
    get() works with the following properties:
    name, faculty, program, major
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
      }
    }
    /*
    set() works with the following properties:
    name, faculty, program, major
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
      }
      return $returnValue;
    }

    public function __destruct()
    {
     
    }

  }
 
?>
