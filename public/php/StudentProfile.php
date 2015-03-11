<?php
  class StudentProfile
  {
    private $name;
    private $courses;
    private $faculty;
    private $program;
    private $major;
    private $creditHours;
    private $GPA;

    public function __construct()
    {
      $this->name = "";
      $this->faculty = "";
      $this->program = "";
      $this->major = "";
      $this->courses = array();
      $this->creditHours = 0;
      $this->GPA = 0.0;
    }
    /*
    get() works with the following properties:
    name, faculty, program, major, courses, creditHours
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
        case "courses":
          $inserted = false;
          foreach($this->courses as &$course){
            if($course->get("department") == $newValue->get("department") &&
               $course->get("courseNumber") == $newValue->get("courseNumber") &&
               $course->get("courseTitle") == $newValue->get("courseTitle") &&
               $course->get("semester") == $newValue->get("semester")){
              $inserted = true;
              $course->set("totalPoints", $newValue->get("totalPoints"));
            }
          }
          if(!$inserted){
            $this->courses[] = $newValue;
          }
          break;
        case "creditHours":
          $this->creditHours = $newValue;
          break;
        case "GPA":
          $this->GPA = $newValue;
          break;
      }
    }
    /*
    set() works with the following properties:
    name, faculty, program, major, course, creditHours
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
        case "courses":
          $returnValue = $this->courses;
          break;
        case "creditHours":
          $returnValue = $this->creditHours;
          break;
        case "GPA":
          $returnValue = $this->GPA;
          break;
      }
      return $returnValue;
    }
    
    public function toArray(){
      return array(
        "name" => $this->name,
        "faculty" => $this->faculty,
        "program" => $this->program,
        "major" => $this->major,
        "courses" => $this->courses,
        "creditHours" => $this->creditHours,
        "GPA" => $this->GPA
      );
    }

    public function __destruct()
    {
     
    }

  }
 
?>
