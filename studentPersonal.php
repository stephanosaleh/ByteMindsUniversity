<?php

include_once('initSession.php');

$gender = $dob = $pob = $nationality = $maritalstatus = $insnb = "";
$errorempty = "";
$error="";
$errorgender = $errormaritalstatus="";

if (isset($_POST['next'])) {

        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $pob = $_POST['pob'];
        $nationality = $_POST['nationality'];
        $maritalstatus = $_POST['maritalstatus'];
        

        $insnb = $_POST['insnb'];
    
      if (isset($_POST['gender']) && !empty($_POST['dob']) && !empty($_POST['pob']) && !empty($_POST['nationality']) && isset($_POST['maritalstatus']) && !empty($_POST['insnb'])) {
        
      if(!preg_match('/\d/', $pob) && !preg_match('/\d/', $nationality) && is_numeric($insnb)) {
        $student->fname = $user->fname;
        $student->lname = $user->lname;
        $student->email = $user->email;
        $student->gender = $gender;
        $student->dob = $dob;
        $student->pob = $pob;
        $student->nationality = $nationality;
        $student->maritalstatus = $maritalstatus;
        $student->insnb = $insnb;
        $_SESSION['student'] = $student;
        header('Location: studentContact.php');
      }

        if(!is_numeric($insnb)) {
          $error="* Insurance Number must only contain digits";
        }

        if(preg_match('/\d/', $nationality)) {
          $error="* Nationality cannot contain digits";
        }

        if(preg_match('/\d/', $pob)) {
          $error="* Place Of Birth cannot contain digits";
        }
        
    } else {
        $errorempty = "*";

        if (!isset($_POST['gender'])) {
          $errorgender = "* Required";
      }
    
    }
}

?>


<html>
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Student Personal Information</title>
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
    height: 1%;
}
.error-message {
  color: red;
            font-size: 12px;
            margin-top: 10px;
            text-align: left;
        }
  </style>
  </head>
  <body>
        
    <div class="main">
        <form method="POST" action="" enctype="multipart/form-data">
            <center>
                <h1 style="color:black">Personal Information</h1>
      </br>
                <?php echo '<span class="error-message">'.$errorgender.'</span>'; ?>
                <br>
                <input type="radio" value="Male" name="gender" style="color:black" id="male"<?php if($gender == 'Male') echo 'checked'; ?>/> Male &nbsp&nbsp&nbsp&nbsp
                <input type="radio" value="Female" name="gender" style="color:black" id="female" <?php if($gender == 'Female') echo 'checked'; ?>/> Female   <br>                         
      </br>
                <input class="form__input " type="date" placeholder="Date Of Birth <?php echo $errorempty; ?>" id="dob" name="dob" max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>" value="<?php echo $dob;?>"><br>
                
                <input type="text" class="form__input" placeholder="Place Of Birth <?php echo $errorempty; ?>" id="pob" name="pob" value="<?php echo $pob;?>"><br>
               
                
                <input type="text" class="form__input" placeholder="Nationality <?php echo $errorempty; ?>" id="nationality" name="nationality" value="<?php echo $nationality;?>"><br>
                
                
                <select class="form__input" name="maritalstatus" id="maritalstatus">
                    <option value="" disabled selected>Select Marital Status <?php echo $errorempty; ?></option>
                    <option value="Single" <?php echo ($maritalstatus == 'Single') ? 'selected' : ''; ?>>Single</option>
                    <option value="Married" <?php echo ($maritalstatus == 'Married') ? 'selected' : ''; ?>>Married</option>
                    <option value="Divorced" <?php echo ($maritalstatus == 'Divorced') ? 'selected' : ''; ?>>Divorced</option>
                </select><br>
                
                <input type="text" class="form__input" placeholder="Insurance Number <?php echo $errorempty; ?>" id="insnb" name="insnb" value="<?php echo $insnb;?>">
      </br></br>
                
                <div class="form-group" x-data="{ fileName: '' }">
            <div class="input-group shadow">
              <span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
              <input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="img[]" class="d-none" style="width: 200; z-index: 50; height: 38; cursor: pointer; opacity: 0; border: 1px solid #000;">
              <input type="text" class="form-control form-control-lg" placeholder="Upload Image" x-model="fileName" readonly>
              <button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="console.log('Clicked!'); $refs.file.click()">
                <i class="fas fa-image"></i> Browse
              </button>
      
            </div>
            </br>
          </div>
          </br></br>
           <?php echo '<span class="error-message">'.$error.'</span>'; ?></br>
           
           
          <a href="create.php" style="color:white;text-decoration: none;"><button  class="form__button button submit" type="submit" name="back">Back </a></button>
          &nbsp;&nbsp;&nbsp;<input type="submit" name="next" value="Next" style="color: white;text-decoration: none;" class="form__button button submit"/>
          
            </center>
        </form>
    </div>
  
  </body>
</html>