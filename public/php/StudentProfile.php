<?php
  class StudentProfile
  {
    private $name;
    private $courses;
    private $faculty;
    private $program;
    private $major;
    private $secondMajor;
    private $creditHours;
    private $inProgressCreditHours;
    private $GPA;

    public function __construct()
    {
      $this->name = "";
      $this->faculty = "";
      $this->program = "";
      $this->major = "";
      $this->secondMajor = "";
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
        case "secondMajor":
          $this->secondMajor = $newValue;
          break;
        case "courses":
          $inserted = false;
          foreach($this->courses as &$course){
            if ($course->get("courseNumber")!=1999 && $course->get("courseNumber")!=2999 &&
              $course->get("courseNumber")!=3999 && $course->get("courseNumber")!=4999)
            {
              if($course->get("department") == $newValue->get("department") &&
                 $course->get("courseNumber") == $newValue->get("courseNumber") &&
                 $course->get("courseTitle") == $newValue->get("courseTitle") &&
                 $course->get("semester") == $newValue->get("semester")){
                $inserted = true;
                $course->set("totalPoints", $newValue->get("totalPoints"));
              }
            }
          }
          if(!$inserted){
            $this->checkSimilarCourse($newValue);
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
        case "secondMajor":
          $returnValue = $this->secondMajor;
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
        "name" => trim($this->name),
        "faculty" => trim($this->faculty),
        "program" => trim($this->program),
        "major" => trim($this->major),
        "secondMajor" => trim($this->secondMajor),
        "creditHours" => trim($this->creditHours),
        "GPA" => trim($this->GPA)
      );
    }

    // check to see if the course being added is substantually similar to a course 
    // that has already been taken. If it has, the student only gets credit for one 
    // of the courses, but can still use both courses towards other requirements.
    private function checkSimilarCourse($course)
    {
      $newSimilar = false;
      $oldSimilar = false;

      // check for substantually similar courses
      foreach($this->listSimilarCourses() as $pair)
      {
        $newSimilar = false;
        $oldSimilar = false;

        // test the course being added agains the substantually similar courses
        foreach($pair as $pairCourse)
        {
          if($pairCourse["department"] == $course->get("department") &&
            $pairCourse["courseNumber"] == $course->get("courseNumber"))
          {
            $newSimilar = true;
          }
        }

        // if the course being added is in the substantually similar courses, check the
        // courses already taken for it's partner
        if($newSimilar)
        {
          foreach($this->courses as $oldCourse) 
          {
            foreach($pair as $pairCourse)
            {
              if($pairCourse["department"] == $oldCourse->get("department") &&
                $pairCourse["courseNumber"] == $oldCourse->get("courseNumber"))
              {
                $oldSimilar = true;
                break;
              }
            }

            // substantually similar course pair found, no need to keep checking
            if($oldSimilar)
            {
              break;          
            } 
          }
        }

        if($newSimilar && $oldSimilar)
        {
          break;
        }
      }

      // If the course being added is not substantually similar to an existing course,
      // add the credit hours for that course to the students total credit hours. If it
      // is substantually similar, do nothing since the student only gets credit for one
      // and the partner course has already been added.
      if(false == $newSimilar && false == $oldSimilar){
        $this->creditHours += $course->get("weight");
      }
    }

    // returns an array of substantually similar courses
    private function listSimilarCourses()
    {
      return array(
        array( array("department" => "ECON", "courseNumber" => 2900), array("department" => "STAT", "courseNumber" => 2780) )
      );
    }

    public function __destruct()
    {
     
    }

  }
 
?>
