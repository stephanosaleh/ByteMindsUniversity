<?php

include_once('initSession.php');

$bac=$bacnumber=$school="";

$empty="";
$error="";
$errorbac="";


$otherdegreeslevels=array();
$otherdegreesnames=array();
$otherdegreesnumbers=array();
$otherdegreesyears=array();



if(isset($_POST['back'])) {
    header('Location:studentContact.php');
}

if(isset($_POST['next'])) {
    $bac=$_POST['bac'];
    $bacnumber=$_POST['bacnumber'];
    $school=$_POST['school'];

        $otherdegreeslevels=$_POST['otherdegreeslevels'];
        $otherdegreesnames=$_POST['otherdegreename'];
        $otherdegreesnumbers=$_POST['otherdegreenumber'];
        $otherdegreesyears=$_POST['otherdegreeyear'];

        if ((isset($_POST['otherdegreeslevels']) || is_array($_POST['otherdegreeslevels'])) && 
        (!empty($_POST['otherdegreename']) || is_array($_POST['otherdegreename'])) && 
        (!empty($_POST['otherdegreenumber']) || is_array($_POST['otherdegreenumber'])) && 
        (isset($_POST['otherdegreeyear']) || is_array($_POST['otherdegreeyear']))) {
            
          $_SESSION['otherdegreeslevels'] = $otherdegreeslevels;
          $otherdegreeslevels=$_SESSION['otherdegreeslevels'];
          $_SESSION['otherdegreesnames'] = $otherdegreesnames;
          $otherdegreesnames=$_SESSION['otherdegreesnames'];
          $_SESSION['otherdegreesnumbers'] = $otherdegreesnumbers;
          $otherdegreesnumbers=$_SESSION['otherdegreesnumbers'];
          $_SESSION['otherdegreesyears'] = $otherdegreesyears;
          $otherdegreesyears=$_SESSION['otherdegreesyears'];
  }
  
    if(isset($_POST['bac']) && !empty($_POST['bacnumber']) && !empty($_POST['school'])) {

        if(is_numeric($bacnumber)) {
            $student->bac=$bac;
            $student->bacnumber=$bacnumber;
            $student->school=$school;
            $student->otherdegreesnames=$otherdegreesnames;
            $student->otherdegreeslevels=$otherdegreeslevels;
            $student->otherdegreesnumbers=$otherdegreesnumbers;
            $student->otherdegreesyears=$otherdegreesyears;
            $_SESSION['student'] = $student;
            header('Location:studentCourses.php');
        }

        else {
            $error="* Baccalaureate Certificate Number must only contain digits";
        }

    } 

    else {
        $empty="*";
    }

    if(!isset($_POST['bac'])) {
            $errorbac="* Required";
    }


}

?>


<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Student Educational </title>
    <link rel="stylesheet" type="text/css" href="main.css"><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
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

        .form__sections {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            width: 100%;
            margin-top: 20px;
        }

        
        .form__section {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            padding: 0 10px;
            height: 100%; 
            overflow-y: auto; 
        }

.form__title {
    font-size: 18px;
    font-weight: 700;
    text-align: center; 
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
            width: 100%;
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

.form__button-container {
            display: flex;
            justify-content: center;
            margin-top: auto; 
        }
        
.button_container {
            position: absolute;
            bottom: 45px; 
            width: 100%;
            text-align: center;
        }

        .degreeinput {
            width: 100%;
            height: 40px;
            margin: 4px 0;
            padding-left: 17px;
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

        .degreeinput::placeholder {
            padding-left: 5px;
        }
  </style>

<script>


function addOtherDegree() {
            var otherdegree=document.createElement('div');
            var otherdegreeslevels=document.createElement('select');
            otherdegreeslevels.name='otherdegreeslevels[]';
            otherdegreeslevels.style.width='32%';
            var defaultOption=document.createElement('option');
            defaultOption.text='Select Level';
            defaultOption.disabled=true;
            otherdegreeslevels.appendChild(defaultOption);

            var yearSelect = document.createElement('select');
            const currentYear=new Date().getFullYear();
                
                for (let year=currentYear; year>=currentYear-10; year--) {
                    const option=document.createElement('option');
                    option.value=year;
                    option.text=year;
                    yearSelect.add(option);
                }
            yearSelect.name = 'otherdegreeyear[]';

            var otherdegreenumber=document.createElement('input');
            otherdegreenumber.name="otherdegreenumber[]";
            otherdegreenumber.className = 'degreeinput';
            otherdegreenumber.style.width="50%";
            otherdegreenumber.style.height="17px";
            otherdegreenumber.placeholder="Degree Number";

            var degreeOptions=['Bachelor\'s', 'Master\'s', 'Other'];

            for(var i=0; i<degreeOptions.length; i++) {
            var option=document.createElement('option');
            option.value=degreeOptions[i];
            option.text=degreeOptions[i];
            otherdegreeslevels.appendChild(option);
            }


            otherdegreeslevels.selectedIndex=0;

            var otherdegreename=document.createElement('input');
            otherdegreename.type='text';
            otherdegreename.className='degreeinput';
            otherdegreename.style.width='40%';
            otherdegreename.style.height='17px';
            otherdegreename.placeholder='Name';
            otherdegreename.name='otherdegreename[]';

            var removeButton=document.createElement('button');
            removeButton.textContent='-';
            removeButton.type='button';
            removeButton.className='bt';
            removeButton.onclick=function () {
            otherdegree.remove();
            };

            otherdegree.appendChild(otherdegreeslevels);
            otherdegree.appendChild(otherdegreename);
            otherdegree.appendChild(removeButton);
            otherdegree.appendChild(document.createElement('br'));
            otherdegree.appendChild(document.createElement('br'));
            otherdegree.appendChild(otherdegreenumber);
            otherdegree.appendChild(yearSelect);
            otherdegree.appendChild(document.createElement('br'));
            otherdegree.appendChild(document.createElement('br'));

            document.getElementById('otherDegreesContainer').appendChild(otherdegree);
        }


</script>

  </head>
  <body>
    <div class="main">
      <form method="post" action="">
        
</br></br>
</br>
      <h1 style="text-align:center; color:black;">Educational Record</h1>
</br>
<div class="form__sections">
  <div class="form__section">
    <div class="form__title" style="text-align:center;">Baccalaureate</div></br>
<center>
<span style="padding-top: 5%;">

  <?php echo '<span style="color:red;">'.$errorbac.'</span>'; ?>

   </br></br>
    <input type="radio" name="bac" value="gs" <?php if($bac=='gs') echo 'checked'; ?>/> General Science - GS &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="radio" name="bac" value="ls" <?php if($bac=='ls') echo 'checked'; ?>/> Life Science - LS
</span>
</br></br></br>
<input class="form__input" type="text" placeholder="Baccalaureate Certificate Number <?php echo $empty; ?>" name="bacnumber" value="<?php echo $bacnumber; ?>"/> </br></br>
<input class="form__input" type="text" placeholder="Former School <?php echo $empty; ?>" name="school" value="<?php echo $school; ?>"/>

</br></br>
<?php echo '<span style="color:red;">'.$error.'</span>'; ?></br>

</center>

</div>
    <div class="form__section">
        <div class="form__title" style="text-align:center;">Other Degrees</div></br></br></br></br>
       

        <center>
            <div id="otherDegreesContainer"></div>
            <div class="form__button-container">
            <button class="bt" type="button" onclick="addOtherDegree()">+</button>
            </div>
        </center>
    </div>

</div>

<center>
            <div class="button_container">
                    <input type="submit" name="back" value="BACK" style="color: white;text-decoration: none;"
                        class="form__button button submit" /> 
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="submit" name="next" value="NEXT" style="color: white;text-decoration: none;"
                        class="form__button button submit" />
            </div>
            </center>
</form>
</body>
</html>