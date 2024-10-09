<?php

include_once('initSession.php');



if(isset($_POST['back'])) {
    header('Location:professorContact.php');
  }

$bac=$bacnumber=$school="";
$errorbac="";
$empty="";
$errorbacnumber="";


$degrees = array();
$degreesnumbers=array();
$degreesyears=array();

$otherdegreeslevels=array();
$otherdegreesnames=array();
$otherdegreesnumbers=array();
$otherdegreesyears=array();

$degreeok=false;
$bacok=false;

$errordegree="";

if (isset($_POST['next'])) {
    
        $bac = $_POST['bac'];
        $bacnumber = $_POST['bacnumber'];
        $school = $_POST['school'];

        $degrees = $_POST['degree'];
        $degreesnumbers=$_POST['degreenumber'];
        $degreesyears=$_POST['degreeyear'];
        
        $otherdegreeslevels=$_POST['otherdegreeslevels'];
        $otherdegreesnames=$_POST['otherdegreename'];
        $otherdegreesnumbers=$_POST['otherdegreenumber'];
        $otherdegreesyears=$_POST['otherdegreeyear'];


        if ((isset($_POST['degree']) || is_array($_POST['degree'])) && (!empty($_POST['degreenumber']) || is_array($_POST['degreenumber'])) && (isset($_POST['degreeyear']) || is_array($_POST['degreeyear']))) {
        
            

            $_SESSION['degrees'] = $degrees;
            $degrees=$_SESSION['degrees'];
            $_SESSION['degreesnumbers'] = $degreesnumbers;
            $degreesnumbers=$_SESSION['degreesnumbers'];
            $_SESSION['degreesyears'] = $degreesyears;
            $degreesyears=$_SESSION['degreesyears'];

            $degreeok=true;

        
    }

    else {
        $errordegree="* Enter at least one degree";
    }


        if ((isset($_POST['otherdegreeslevels']) || is_array($_POST['otherdegreeslevels'])) && (!empty($_POST['otherdegreename']) || is_array($_POST['otherdegreename'])) && (!empty($_POST['otherdegreenumber']) || is_array($_POST['otherdegreenumber'])) && (isset($_POST['otherdegreeyear']) || is_array($_POST['otherdegreeyear']))) {
            
            $_SESSION['otherdegreeslevels'] = $otherdegreeslevels;
            $otherdegreeslevels=$_SESSION['otherdegreeslevels'];
            $_SESSION['otherdegreesnames'] = $otherdegreesnames;
            $otherdegreesnames=$_SESSION['otherdegreesnames'];
            $_SESSION['otherdegreesnumbers'] = $otherdegreesnumbers;
            $otherdegreesnumbers=$_SESSION['otherdegreesnumbers'];
            $_SESSION['otherdegreesyears'] = $otherdegreesyears;
            $otherdegreesyears=$_SESSION['otherdegreesyears'];
    }
        

    if (isset($_POST['bac']) && !empty($_POST['bacnumber']) && !empty($_POST['school'])) {
        

            if(is_numeric($bacnumber)) {
                $bacok=true;
            }
            else {
                $errorbacnumber="* Baccalaureate Certificate Number </br> must only contain digits";
            }
    }

    else {
        $empty = "*";
    }

if(!isset($_POST['bac'])) {
    $errorbac="* Required";
}

if($bacok && $degreeok) {
    $professor->bac=$bac;
    $professor->bacnumber=$bacnumber;
    $professor->school=$school;
    $professor->degrees=$degrees;
    $professor->degreesnumbers=$degreesnumbers;
    $professor->degreesyears=$degreesyears;
    $professor->otherdegreesnames=$otherdegreesnames;
    $professor->otherdegreeslevels=$otherdegreeslevels;
    $professor->otherdegreesnumbers=$otherdegreesnumbers;
    $professor->otherdegreesyears=$otherdegreesyears;
    $_SESSION['professor'] = $professor;
    header('Location: professorUni1.php');

}
}

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Create & Login Form</title>
    <link rel="stylesheet" type="text/css" href="main.css">
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
            min-height: 450px;
            height: 570px;
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
            margin-bottom: 10px;
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
            left: calc(100% - 600px);
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


        .bt {
            width: 20px;
            border-radius: 7px;
            outline: none;
            border: none;
            background-color: white;
            color:gray;
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

            var yearSelect = document.getElementById('selectYear').cloneNode(true);
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



        function addDegree() {
        var degreeCount = document.getElementById('degreeCount');
        degreeCount.value++;

        var degree = document.createElement('div');
        
        var degreeSelect = document.getElementById('degree').cloneNode(true);
        degreeSelect.name = 'degree[]'; 
        degree.appendChild(document.createElement('br'));
        var removeButton = document.createElement('button');
        removeButton.textContent = '-';
        removeButton.type = 'button';
        removeButton.className = 'bt';

        removeButton.onclick = function () {
        degree.remove();
        degreeCount.value--;
        };

        
        degree.appendChild(document.createElement('br'));

        degree.appendChild(degreeSelect);
        degree.appendChild(removeButton);
        degree.appendChild(document.createElement('br'));
        degree.appendChild(document.createElement('br'));
        
        var yearSelect = document.getElementById('selectYear').cloneNode(true);
        yearSelect.name = 'degreeyear[]';  
        
        
        var degreeNumber=document.createElement('input');
        degreeNumber.name='degreenumber[]';
        degreeNumber.className = 'degreeinput';
        degreeNumber.style.width="50%";
        degreeNumber.style.height="17px";
        degreeNumber.placeholder="Degree Number";

        degree.appendChild(degreeNumber);
        degree.appendChild(yearSelect);
        degree.appendChild(document.createElement('br'));
        document.getElementById('newdegree').appendChild(degree);
    }
        
    </script>
</head>

<body>


    <div class="main">
    <form method="post" action="">
    </br></br></br>
    <h1 style="text-align:center; color:black;">Educational Record</h1></br>

    <div class="form__sections">

        <div class="form__section">
            <div class="form__title" style="text-align:center;">Baccalaureate</div></br>  
                <center>
                <?php 
                echo '<span style="color: red;">' . $errorbac . '</span>';
                ?>
                </br></br>
                <input type="radio" name="bac" value="gs" <?php if($bac == 'gs') echo 'checked'; ?>/> General Science - GS &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="radio" name="bac" value="ls" <?php if($bac == 'ls') echo 'checked'; ?>/> Life Science - LS

                </br></br></br></br>

            <input class="form__input" type="text" placeholder="Baccalaureate Certificate Number <?php echo $empty; ?>" name="bacnumber"value="<?php echo $bacnumber; ?>"> </br></br>
            <input class="form__input" type="text" placeholder="Former School <?php echo $empty; ?>" name="school" value="<?php echo $school; ?>">
                
            </br></br>
            <?php echo '<span style="color:red;">'.$errorbacnumber.'</span>'; ?>
            </center>
        </div>




        <div class="form__section">
        <div class="form__title" style="text-align:center;">Field Degrees</div></br>

        <?php echo '<span style="color:red; text-align:center;">' . $errordegree . '</span>'; ?></br>

        <center>
           
            <select id="degree" name="degree[]">
                <option value="" disabled selected>Select your degree <?php if(isset($emptydegree))echo $emptydegree; ?></option>
                <option value="Artificial Intelligence"><?php echo $majors->majors[0];?></option>
                <option value="Computer Engineering"><?php echo $majors->majors[1];?></option>
                <option value="Computer Graphics"><?php echo $majors->majors[2];?></option>
                <option value="Computer Network"><?php echo $majors->majors[3];?></option>
                <option value="Computer Science"><?php echo $majors->majors[4];?></option>
                <option value="Cybersecurity"><?php echo $majors->majors[5];?></option>
                <option value="Data Science"><?php echo $majors->majors[6];?></option>
                <option value="Game Development"><?php echo $majors->majors[7];?></option>
                <option value="Information Systems"><?php echo $majors->majors[8];?></option>
                <option value="Information Technology"><?php echo $majors->majors[9];?></option>
                <option value="Software Engineering"><?php echo $majors->majors[10];?></option>
                <option value="Telecommunication"><?php echo $majors->majors[11];?></option>
                <option value="Web Development"><?php echo $majors->majors[12];?></option>
    </select></br></br>

    <input class="degreeinput" style="width: 50%; height: 17px;" type="text" name="degreenumber[]" placeholder="Degree Number <?php echo $emptydegree; ?>" />
            

                <select id="selectYear" name="degreeyear[]">
                <option value="" disabled selected>Year</option>
                </select>

            <input type="hidden" name="degreeCount" id="degreeCount" value="1">

            <script>
                
                const currentYear=new Date().getFullYear();
                const selectYear=document.getElementById('selectYear');

                for (let year=currentYear; year>=currentYear-10; year--) {
                    const option=document.createElement('option');
                    option.value=year;
                    option.text=year;
                    selectYear.add(option);
                }
            </script>

            <div id="newdegree"></div>
            </br>
            <div class="form__button-container">
            <button class="bt" type="button" onclick="addDegree()">+</button>
            </div>
        </center>
    </div>



        <div class="form__section">
        <div class="form__title" style="text-align:center;">Other Degrees</div></br>
       

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
                        class="form__button button submit" /> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="submit" name="next" value="NEXT" style="color: white;text-decoration: none;"
                        class="form__button button submit" />
            </div>
            </center>
        </form>
    </div>
</body>
</html>


