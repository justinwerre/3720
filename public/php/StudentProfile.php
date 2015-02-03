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
      if($property == "name")
      {
        $this->name = $newValue;
      }
      else
      {
        $this->faculty = $newValue;
      }
    }
    /*
    set() works with the following properties:
    name, faculty
    */
    public function get($property)
    {
      $returnValue = "";
      if($property == "name")
      {
        $returnValue = $this->name;
      }
      else
      {
        $returnValue = $this->faculty;
      }
      return $returnValue;
    }

    public function __destruct()
    {
     
    }

  }
 
?>
