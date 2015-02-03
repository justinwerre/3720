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
    
    public function get($property)
    {
      if($property == "name")
      {
        return $this->name;
      }
      else
      {
        return $this->faculty;
      }
    }

    public function __destruct()
    {
     
    }

  }
 
?>
