<?php
  class StudentProfile
  {
    private $name;
    private $classes;
    private $faculty;

    public function __construct()
    {
      $this->name = "";
    }
    /*
    get() works with the following properties:
    name, faculty
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
      }
    }
    /*
    set() works with the following properties:
    name, faculty
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
      }
      
      return $returnValue;
    }

    public function __destruct()
    {
     
    }

  }
 
?>
