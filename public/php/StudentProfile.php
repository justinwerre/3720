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
    
    public function get()
    {
      return $this->name;
    }

    public function __destruct()
    {
     
    }

  }
 
?>
