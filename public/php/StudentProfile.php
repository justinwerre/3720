<?php
  class StudentProfile
  {
    private $name;
    private $classes;

    public function __construct()
    {
      $this->name = "";
    }
    
    public function set($property)
    {
      $this->name = $property;
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
