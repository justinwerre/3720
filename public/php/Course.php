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
      $this->dept = "CPSC";
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
      switch ($property)
      {
        case "dept":
          return $this->dept;
          break;
        case "courseNumber":
          return $this->courseNumber;
          break;
        case "courseTitle":
          return $this->courseTitle;
          break;
      }
    }
    /*
    set() works with the following properties:
    dept, courseNumber, courseTitle
    */
    public function set($property,$newValue)
    {
      switch ($property)
      {
        case "dept":
          $this->dept = $newValue;
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
