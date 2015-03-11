<?php
  class Course
  {
    private $department;
    private $courseNumber;
    private $courseTitle;
    private $weight;
    private $totalPoints;
    private $semester;

    public function __construct()
    {
      $this->department = "";
      $this->courseNumber = "";
      $this->courseTitle = "";
      $this->weight = "";
      $this->totalPoints = "";
      $this->semester = "";
    }
    /*
    get() works with the following properties:
    department, courseNumber, courseTitle, weight, and totalPoints
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
        case "weight":
          $returnValue = $this->weight;
          break;
        case "totalPoints":
          $returnValue = $this->totalPoints;
          break;
        case "semester":
          $returnValue = $this->semester;
          break;
      }
      return $returnValue;
    }
    /*
    set() works with the following properties:
    department, courseNumber, courseTitle, weight, and totalPoints
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
        case "weight":
          $this->weight = $newValue;
          break;
        case "totalPoints":
          $this->totalPoints = $newValue;
          break;
        case "semester":
          $this->semester = $newValue;
          break;
      }
    }
    
    public function toArray()
    {
      return array(
        "department" => $this->department,
        "courseNumber" => $this->courseNumber,
        "courseTitle" => $this->courseTitle,
        "weight" => $this->weight,
        "totalPoints" => $this->totalPoints,
        "semester" => $this->semester
      );
    }

    public function __destruct()
    {
     
    }

  }
 
?>
