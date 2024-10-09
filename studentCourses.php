<?php
include_once('initSession.php');

$branchname =$major=$languages = "";
$errorempty = "";
$errorbranchname = "";
$errormajor = "";
$errorlanguages = "";
if (isset($_POST['next'])) {
    if (isset($_POST['branchname']) && isset($_POST['major'])){
        $branchname = $_POST['branchname'];
        $major = $_POST['major'];
        $languages =$_POST['languages'];
       
        $student ->branchname= $branchname; 
        $student ->major= $major;
        $student ->languages= $languages;
      if (isset($_POST['semester1']) && is_array($_POST['semester1'])) {
          $selectedCourses = $_POST['semester1'];
          $student->semester1   = $selectedCourses;
      }
      if (isset($_POST['semester2']) && is_array($_POST['semester2'])) {
        $selectedCoursesSemester2 = $_POST['semester2'];
        $student->semester2 = $selectedCoursesSemester2; 
    }
    $_SESSION['student'] = $student;
        //print_r($student);
        //var_dump($student->semester1);
        header('Location:studdash.php');
        
    } else {
        $errorempty = "All fields are required!";
       
        if (!isset($_POST['branchname'])) {
          $errorbranchname = "*Required!";
      }
      
      if (!isset($_POST['major'])) {
        $errormajor = "*Required!";
      }
      if (!isset($_POST['languages'])) {
        $errormajor = "*Required!";
    }
    }

}



?>


<html>
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Student Courses and Branch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="main.css"><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">

 <style>
*, *::after, *::before {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  user-select: none;
}
body {
  width: 100%;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  font-family: "Montserrat", sans-serif;
  font-size: 12px;
  background-color: #ecf0f3;
  color: #a0a5a8;
}
.main {
  position: relative;
  width: 1000px;
  min-width: 1000px;
  min-height: 600px;
  height: 600px;
  padding: 25px;
  background-color: #ecf0f3;
  box-shadow: 10px 10px 10px #d1d9e6, -10px -10px 10px #f9f9f9;
  border-radius: 12px;
  overflow: hidden;
}
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  top: 0;
  width: 600px;
  height: 100%;
  padding: 25px;
  background-color: #ecf0f3;
  transition: 1.25s;
}
.form {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  width: 100%;
  height: 100%;
}
.form__icon {
  object-fit: contain;
  width: 30px;
  margin: 0 5px;
  opacity: 0.5;
  transition: 0.15s;
}
.form__icon:hover {
  opacity: 1;
  transition: 0.15s;
  cursor: pointer;
}
.form__input {
  width: 350px;
  height: 40px;
  margin: 4px 0;
  padding-left: 25px;
  font-size: 13px;
  letter-spacing: 0.15px;
  border: none;
  outline: none;
  font-family: "Montserrat", sans-serif;
  background-color: #ecf0f3;
  transition: 0.25s ease;
  border-radius: 8px;
  box-shadow: inset 2px 2px 4px #d1d9e6, inset -2px -2px 4px #f9f9f9;
}
.form__input:focus {
  box-shadow: inset 4px 4px 4px #d1d9e6, inset -4px -4px 4px #f9f9f9;
}
.form__span {
  margin-top: 30px;
  margin-bottom: 12px;
}
.title {
  font-size: 34px;
  font-weight: 700;
  line-height: 3;
  color: #181818;
}
.description {
  font-size: 14px;
  letter-spacing: 0.25px;
  text-align: center;
  line-height: 1.6;
}
.button {
  width: 180px;
  height: 50px;
  border-radius: 25px;
  margin-top: 50px;
  font-weight: 700;
  font-size: 14px;
  letter-spacing: 1.15px;
  background-color: #4B70E2;
  color: #f9f9f9;
  box-shadow: 8px 8px 16px #d1d9e6, -8px -8px 16px #f9f9f9;
  border: none;
  outline: none;
}
.a-container {
  z-index: 100;
  left: calc(100% - 600px );
}
.switch {
  display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 400px;
  padding: 50px;
  z-index: 200;
  transition: 1.25s;
  background-color: #ecf0f3;
  overflow: hidden;
  box-shadow: 4px 4px 10px #d1d9e6, -4px -4px 10px #f9f9f9;
}
.switch__circle {
  position: absolute;
  width: 500px;
  height: 500px;
  border-radius: 50%;
  background-color: #ecf0f3;
  box-shadow: inset 8px 8px 12px #d1d9e6, inset -8px -8px 12px #f9f9f9;
  bottom: -60%;
  left: -60%;
  transition: 1.25s;
}
.switch__circle--t {
  top: -30%;
  left: 60%;
  width: 300px;
  height: 300px;
}
.switch__container {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  position: absolute;
  width: 400px;
  padding: 50px 55px;
  transition: 1.25s;
}

.button1 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}

.button1:hover {
  background-color: #4B70E2;
  color: #f9f9f9;
}
#imageUpload {
  border: none;
  outline: none;
}
input[type=file] {
   width: 200px;
   z-index: 50;
   height: 38px;
   cursor: pointer; 
   opacity: 0;
   border: 1px solid #000;
 }
 .input-group {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
    width: 37%;
}
.error-message {
  color: red;
  font-size: 12px;
  margin-top: 10px;
  text-align: left;
}
.hidden {
  display: none;
}
.semester-container {
            display: flex;
            justify-content: space-around;
        }

       /* .semester {
            padding: 10px;
            margin: 10px;
        }*/


        
  </style>
  </head>
  <body>
    <div class="main">
        <form method="POST" action="" enctype="multipart/form-data" onsubmit="return validateForm()">
<?php

$user = 'root'; // MAMP server username
$password = 'root'; // MAMP server password
$db = 'softpr'; // Database name
$host = 'localhost'; // Hostname
$port = 8889; // MAMP server port

// Establish a MySQLi connection
$link = mysqli_init();
$success = mysqli_real_connect(
    $link,
    $host,
    $user,
    $password,
    $db,
    $port
);

// Check the connection
if (!$success) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL statement
$sql = "INSERT INTO students (siscode, fname, lname, email, gender, dob, pob, nationality, maritalstatus, insnb, sPhoneNumber, sCity, sStreet, sBuilding, sFloor, sRegion, bac, bacnumber, school, branchname, major, languages, semester1, semester2, otherdegreeslevels, otherdegreesnames, otherdegreesnumbers, otherdegreesyears)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,? ,? ,? ,?)";

// Prepare and bind parameters
$stmt = $link->prepare($sql);

// Check if the preparation was successful
if (!$stmt) {
    die("Error in preparing statement: " . $link->error);
}

// Calculate siscode 
$result = $link->query("SELECT COUNT(*) AS count FROM students");
$row = $result->fetch_assoc();
$count = $row['count'] + 1; // Increment count for the new record
$siscode = "S" . $count;

$_SESSION['siscode'] = $siscode;

$fname = $student->fname;
$lname = $student->lname;
$email = $student->email;
$gender = $student->gender;
$dob = $student->dob;
$pob = $student->pob;
$nationality = $student->nationality;
$maritalstatus = $student->maritalstatus;
$insnb = $student->insnb;
$sPhoneNumber = $student->sPhoneNumber;
$sCity = $student->sCity;
$sStreet = $student->sStreet;
$sBuilding = $student->sBuilding;
$sFloor = $student->sFloor;
$sRegion = $student->sRegion;
$bac = $student->bac;
$bacnumber = $student->bacnumber;
$school = $student->school;
$branchname = $student->branchname;
$major = $student->major;
$languages = $student->languages;
if (is_array($student->semester1)) {
    $semester1 = implode(", ", $student->semester1);
} else {
    $semester1 = "No courses selected for Semester 1";
}
if (is_array($student->semester2)) {
    $semester2 = implode(", ", $student->semester2);
} else {
    $semester2 = "No courses selected for Semester 2";
}
$otherdegreeslevels = implode(", ", $student->otherdegreeslevels);
$otherdegreesnames = implode(", ", $student->otherdegreesnames);
$otherdegreesnumbers = implode(", ", $student->otherdegreesnumbers);
$otherdegreesyears = implode(", ", $student->otherdegreesyears);

$stmt->bind_param("sssssssssissssssssssssssssss", $siscode, $fname, $lname, $email, $gender, $dob, $pob, $nationality, $maritalstatus, $insnb, $sPhoneNumber, $sCity, $sStreet, $sBuilding, $sFloor, $sRegion, $bac, $bacnumber, $school, $branchname, $major, $languages, $semester1, $semester2, $otherdegreeslevels, $otherdegreesnames, $otherdegreesnumbers, $otherdegreesyears);

// Execute the statement
$result = $stmt->execute();

// Check for success
if ($result) {
    //echo "Student data inserted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$link->close();


?>



        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
       
        <center>
                <h1 style="color:black">Branch and Course</h1>
                <p>Welcome to the First Year Registration L1!</p>
                <select class="form__input" name="branchname" id="branchname">
                    <option value="" disabled selected>Select Branch<?php echo (empty($_POST['branchname']) && isset($_POST['next'])) ? ' *' : ''; ?></option>
                    <option value="Hadath" <?php echo ($branchname == 'Hadath') ? 'selected' : ''; ?>>Hadath</option>
                    <option value="Akkar" <?php echo ($branchname == 'Akkar') ? 'selected' : ''; ?>>Akkar</option>
                    <option value="Koura" <?php echo ($branchname == 'Koura') ? 'selected' : ''; ?>>Koura</option>
                </select><br>
                <select class="form__input" name="major" id="major" onchange="showCourses()">
                    <option value="" disabled selected>Select Major<?php echo (empty($_POST['major']) && isset($_POST['next'])) ? ' *' : ''; ?></option>
                    <option value="Artificial Intelligence" <?php echo ($major == 'Artificial Intelligence') ? 'selected' : ''; ?>>Artificial Intelligence</option>
                    <option value="Computer Engineering" <?php echo ($major == 'Computer Engineering') ? 'selected' : ''; ?>>Computer Engineering</option>
                    <option value="Computer Graphics" <?php echo ($major == 'Computer Graphics') ? 'selected' : ''; ?>>Computer Graphics</option>
                    <option value="Computer Network " <?php echo ($major == 'Computer Network ') ? 'selected' : ''; ?>>Computer Network</option>
                    <option value="Computer Science " <?php echo ($major == 'Computer Science ') ? 'selected' : ''; ?>>Computer Science</option>
                    <option value="Cybersecurity " <?php echo ($major == 'Cybersecurity ') ? 'selected' : ''; ?>>Cybersecurity </option>
                    <option value="Data Science " <?php echo ($major == 'Data Science ') ? 'selected' : ''; ?>>Data Science</option>
                    <option value="Game Development " <?php echo ($major == 'Game Development ') ? 'selected' : ''; ?>>Game Development </option>
                    <option value="Information Systems " <?php echo ($major == 'Information Systems ') ? 'selected' : ''; ?>>Information Systems</option>
                    <option value="Information Technology " <?php echo ($major == 'Information Technology ') ? 'selected' : ''; ?>>Information Technology</option>
                    <option value="Software Engineering " <?php echo ($major == 'Software Engineering ') ? 'selected' : ''; ?>>Software Engineering</option>
                    <option value="Telecommunication " <?php echo ($major == 'Telecommunication ') ? 'selected' : ''; ?>>Telecommunication</option>
                    <option value="Web Development " <?php echo ($major == 'Web Development ') ? 'selected' : ''; ?>>Web Development</option>
                  </select><br>
                <select class="form__input" name="languages" id="languages">
                    <option value="" disabled selected>Select Language<?php echo (empty($_POST['languages']) && isset($_POST['next'])) ? ' *' : ''; ?></option>
                    <option value="French" <?php echo ($languages == 'French') ? 'selected' : ''; ?>>French</option>
                    <option value="English" <?php echo ($languages == 'English') ? 'selected' : ''; ?>>English</option>
                </select><br>
                
                <div class="semester-container">
                    <div class="semester" id="semester1" class="hidden">
                        <h6>Semester 1:</h6>
                        <label for="s1course1">  
                            <input type="checkbox" name="semester1[]" id="s1course1" value="Introduction to Programming"> Introduction to Programming
                        </label><br>
                        <label for="s1course1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="semester1[]" id="s1course1" value="Mathematics for Computer Science"> Mathematics for Computer Science
                        </label><br>
                        <label for="s1course1">
                            <input type="checkbox" name="semester1[]" id="s1course1" value="Computer Architecture"> Computer Architecture&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </label><br>
                        <label for="s1course1">
                            <input type="checkbox" name="semester1[]" id="s1course1" value=" Discrete Mathematics"> Discrete Mathematics&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </label><br>
                        <label for="s1course1">&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="semester1[]" id="s1course1" value="Data Structures and Algorithms"> Data Structures and Algorithms
                        </label><br>
                        <label for="s1course1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="semester1[]" id="s1course1" value="Introduction to Operating Systems"> Introduction to Operating Systems
                        </label><br>
                        <label for="s1course1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="semester1[]" id="s1course1" value="Computer Networks Fundamentals"> Computer Networks Fundamentals
                        </label><br>
                        
                    </div>
        
                    <div class="semester" id="semester2" class="hidden">
                        <h6>Semester 2:</h6>
                        <label for="s2course1">
                            <input type="checkbox" name="semester2[]" id="s2course1" value=" Introduction to Database Systems"> Introduction to Database Systems
                        </label><br>
                        <label for="s2course1">
                            <input type="checkbox" name="semester2[]" id="s2course1" value="Software Engineering Principles"> Software Engineering Principles &nbsp;&nbsp;&nbsp;
                        </label><br>
                        <label for="s2course1">
                            <input type="checkbox" name="semester2[]" id="s2course1" value="Introduction to Cybersecurity"> Introduction to Cybersecurity&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </label><br>
                        <label for="s2course1">
                            <input type="checkbox" name="semester2[]" id="s2course1" value="Web Development Basics"> Web Development Basics&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </label><br>
                        <label for="s2course1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="semester2[]" id="s2course1" value=" Computer Ethics and Professionalism"> Computer Ethics and Professionalism
                        </label><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="s2course1">
                            <input type="checkbox" name="semester2[]" id="s2course1" value="Communication Skills for Computer Scientists"> Communication Skills for Computer Scientists
                        </label><br>
                        <label for="s2course1">&nbsp;&nbsp;
                            <input type="checkbox" name="semester2[]" id="s2course1" value=" Introduction to Artificial Intelligence"> Introduction to Artificial Intelligence
                        </label>
              
                        
                    </div>
                </div>

                <div id="error-message" class="error" style="color:red;"></div>

                <a href="studentEducational.php" style="color:white;text-decoration: none;">
                    <button  class="form__button button submit" type="submit" name="back">Back 
                    </button>
                </a>
                &nbsp;&nbsp;&nbsp;
                <input type="submit" name="next" value="Next" style="color: white;text-decoration: none;" class="form__button button submit"/>
          
            </center>
        </form>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        
        var majorDropdown = document.getElementById('major');
        var semester1Div = document.getElementById('semester1');
        var semester2Div = document.getElementById('semester2');

        
        if (majorDropdown.value === "") {
            semester1Div.classList.add('hidden');
            semester2Div.classList.add('hidden');
        }

      
        majorDropdown.addEventListener('change', function() {
            if (majorDropdown.value === "") {
                semester1Div.classList.add('hidden');
                semester2Div.classList.add('hidden');
            } else {
                semester1Div.classList.remove('hidden');
                semester2Div.classList.remove('hidden');
            }
        });
    });

    function validateForm() {
        var semester1Courses = document.querySelectorAll('input[name="semester1[]"]:checked');
        var semester2Courses = document.querySelectorAll('input[name="semester2[]"]:checked');
        var errorMessage = document.getElementById('error-message');

        if (semester1Courses.length !== 5 || semester2Courses.length !== 5) {
            errorMessage.innerHTML = '*Please select exactly 5 courses from each semester.';
            return false;
        } else {
            errorMessage.innerHTML = '';
            return true;
        }
    }
</script>


  </body>
</html>