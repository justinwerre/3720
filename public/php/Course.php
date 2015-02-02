<?php
  class Course
  {
    private $department;
    private $courseNumber;
    private $courseTitle;
    private $weight;
    private $totalPoints;

    public function __construct()
    {
      $this->department = "CPSC";
      $this->courseNumber = "";
      $this->courseTitle = "";
      $this->weight = "";
      $this->totalPoints = "";
    }
    /*
    get() works with the following properties:
    dept, courseNumber, courseTitle
    */
    public function get($property)
    {
      $returnValue = "";
      switch ($property)
      {
        case "department":
          $returnValue = $this->department;
          break;
        case "courseNumber":
          $returnValue = $this->courseNumber;
          break;
        case "courseTitle":
          $returnValue = $this->courseTitle;
          break;
      }
      return $returnValue;
    }
    /*
    set() works with the following properties:
    dept, courseNumber, courseTitle
    */
    public function set($property,$newValue)
    {
      switch ($property)
      {
        case "department":
          $this->department = $newValue;
          break;
        case "courseNumber":
          $this->courseNumber = $newValue;
          break;
        case "courseTitle":
          $this->courseTitle = $newValue;
          break;
      }
      
    }

    public function __destruct()
    {
     
    }

  }
 
?>
