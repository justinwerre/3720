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

    public function get($property)
    {
      switch ($property)
      {
        case "dept":
          return $this->dept;
          break;
        default: 
      }
    }

    public function set($property,$newValue)
    {
      if($property == "dept")
      {
        $this->dept = $newValue;
      }
    }

    public function __destruct()
    {
     
    }

  }
 
?>
