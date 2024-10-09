<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once('initSession.php');

if(isset($_POST['back'])) {
    header('Location:professorUni1.php');
}

$selectedYears = [];
$checkedYears=[];
$checkedcourses=[];
$displayCourses = true;

if(isset($_POST['selected_courses'])) {
$selectedcourses=$_POST['selected_courses'];
}

if (isset($_POST['next'])) {
    $selectedYears = isset($_POST['selected_years']) ? $_POST['selected_years'] : [];
    $checkedcourses = [];
    $_SESSION['error']="";
    foreach ($selectedYears as $selectedYear) {
 
        if (isset($_POST['selected_courses_' . $selectedYear])) {
           
            $checkedcourses = array_merge($checkedcourses, $_POST['selected_courses_' . $selectedYear]);
        }
    }

    if(empty($selectedYears)) {
        $_SESSION['error']="* Year selection is required";
    }

    if(!empty($selectedYears) && empty($checkedcourses)) {
        $_SESSION['error']="* Course selection is required";
        header('Location:professorUni2.php');
    }

    if (!empty($selectedYears) && !empty($checkedcourses)) {
        if (count($checkedcourses) > 5) {
            $_SESSION['error']= "* Select 5 courses at most";
            $displayCourses = false; 
        } else {
            $professor->taughtyears = $selectedYears;
            $professor->taughtcourses = $checkedcourses;
            $_SESSION['professor'] = $professor;
            header('Location:profdash.php');
        }
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
    width: 1300px;
    min-width: 1000px;
    min-height: 450px;
    height: 1000px;
    padding: 25px;
    background-color: #ecf0f3;
    box-shadow: 10px 10px 10px #d1d9e6, -10px -10px 10px #f9f9f9;
    border-radius: 12px;
    overflow: hidden;
}

.container {
    display: flex;
    justify-content: space-between; 
    align-items: center;
    position: absolute;
    top: 0;
    width: 100%; 
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
    justify-content: space-between; 
}

.form__section {
    flex: 1;
    max-width: calc(25% - 20px); 
    margin: 20px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    height: 200px;
    color:black;
}
        .form__section > div {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
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

        .form__section label {
            display: block;
            margin-bottom: 5px;
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
            display: flex;
            justify-content: center;
            width: 100%;
            text-align: center;
            margin-top: auto;
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

        

        .course-columns {
    display: flex;
    text-align: left;
    flex-wrap: wrap;
    margin-left: -5%;
    width: calc(100% + 10%);
}

.column {
    width: 48%; 
    font-size: 8px;
    margin-left: -5%;
    margin-right: 7%; 
}

.courses-container {
    display: flex;
    text-align: left;
    flex-wrap: wrap;
    margin-left: -5%;
    width: calc(100% + 10%);
    height: 200px; 
    overflow: hidden; 
}

.course-column {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-top: 20px;
    width: 100%;
    text-align: left;
    margin-left: -10px;
}

.course-label {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    white-space: nowrap; 
    font-size: 9px;
    color:black;
}

.course-label input {
    margin-right: 5px;
    margin-left: 0;
    align-self: flex-start; 
   
}

.year-5-container {
        display: flex;
        justify-content: center; 
        margin-top: 7px;
        margin-left: -112px;
        text-align: left;
    }

    .year-5-column {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        text-align: left;
        margin-top: 7px;
        width: 100%;
        margin-left: 30px;
    }

    .year-5-column h3 {
        margin-bottom: 10px;
        font-size: 14px;
    }

    .year-5-column .course-label {
        font-size: 12px;
        white-space: nowrap;
        margin-bottom: 5px;
        justify-content: flex-start;
        display: flex;
    }

.form__section.no-courses-selected {
    max-width: calc(25% - 20px);
}


    </style>

    <script>
       function toggleCourses(year) {
            var coursesContainer = document.getElementById('courses_' + year);

            if (coursesContainer.style.display === 'none' || coursesContainer.style.display === '') {
                coursesContainer.style.display = 'block';
            } else {
                coursesContainer.style.display = 'none';
            }
        }

    </script>

</head>



<body>
    <div class="main">
        <form method="post" action="">


            </br>
            
            <h1 style="text-align:center; color:black;">BMU</h1></br>

            <center>
            <?php 
            if(isset($_SESSION['error'])) {
                echo '<span style="color: red;">' . $_SESSION['error'] . '</span>'; 
             }
                ?>
                <div class="form__sections">
                    <?php for ($year = 1; $year <= 4; $year++): ?>
                        <div class="form__section <?php echo (!empty($selectedYears) && empty($checkedcourses)) ? 'no-courses-selected' : ''; ?>">
                            <label>
                                <input type="checkbox" name="selected_years[]" value="<?php echo $year; ?>" onchange="toggleCourses(<?php echo $year; ?>)" <?php echo (in_array($year, $selectedYears)) ? 'checked' : ''; ?>>
                                Year <?php echo $year; ?>
                            </label>

                            <div id="courses_<?php echo $year; ?>" style="display: <?php echo (in_array($year, $selectedYears)) ? 'flex' : 'none'; ?>;">
                                </br>
                                <div class="course-column">
                                    <?php if (isset($courses->year[$year])): ?>
                                        <?php foreach ($courses->year[$year] as $course): ?>
                                            <label class="course-label">
                                                <input type="checkbox" name="selected_courses_<?php echo $year; ?>[]" value="<?php echo $course; ?>">
                                                <?php echo $course; ?>
                                            </label><br>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>

                <?php if (!empty($selectedYears)): ?>
                    <?php if ($displayCourses && !empty($selectedYears)): ?>
                        <div class="form__section">
                            <?php foreach ($selectedYears as $selectedYear): ?>
                                <?php if ($selectedYear == 5): ?>
                                    <?php foreach ($courses->year[5] as $majorName => $majorCourses): ?>
                                        <div class="year-5-column">
                                            <h3><?php echo $majorName; ?></h3></br>
                                            <?php if (isset($courses->year[5][$majorName])): ?>
                                                <?php foreach ($courses->year[5][$majorName] as $course): ?>
                                                    <label class="course-label">
                                                        <input type="checkbox" name="selected_courses_<?php echo $selectedYear; ?>[]" value="<?php echo $course; ?>">
                                                        <?php echo $course; ?>
                                                    </label></br>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php elseif (isset($courses->year[$selectedYear])): ?>
                                    <div class="course-column">
                                        <?php foreach ($courses->year[$selectedYear] as $course): ?>
                                            <label class="course-label">
                                                <input type="checkbox" name="selected_courses_<?php echo $selectedYear; ?>[]" value="<?php echo $course; ?>">
                                                <?php echo $course; ?>
                                            </label><br>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

            </br></br></br> </br></br></br> </br></br></br> </br></br></br> </br></br></br></br></br>

            <div class="form__section">
                <label>
                    <input type="checkbox" name="selected_years[]" value="5" onchange="toggleCourses(5)" <?php echo (in_array(5, $selectedYears)) ? 'checked' : ''; ?>>
                    Year 5
                </label>

                <div id="courses_5" class="year-5-container" style="display: <?php echo (in_array(5, $selectedYears)) ? 'flex' : 'none'; ?>;">
                <?php if (isset($professor->taughtmajors) && !empty($professor->taughtmajors)): ?>
    <div class="year-5-container">
        <?php
        $numMajors = count($professor->taughtmajors);
        $columnWidth = floor(100 / $numMajors); // Calculate the width for each column
        foreach ($professor->taughtmajors as $majorName):
        ?>
            <div class="year-5-column" style="width: <?php echo $columnWidth; ?>%;">
                <h3><?php echo $majorName; ?></h3></br>
                <?php if (isset($courses->year[5][$majorName])): ?>
                    <?php foreach ($courses->year[5][$majorName] as $course): ?>
                        <label class="course-label">
                            <input type="checkbox" name="selected_courses_5[]" value="<?php echo $course; ?>">
                            <?php echo $course; ?>
                        </label><br>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
                    
                </div>
            </div>

        </br></br>

       
<?php

$user = 'root'; 
$password = 'root'; 
$db = 'softpr'; 
$host = 'localhost'; 
$port = 3306; 

$link = mysqli_init();
$success = mysqli_real_connect(
    $link,
    $host,
    $user,
    $password,
    $db,
    $port
);

if (!$success) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO professors (siscode,fname,lname,email,gender,dob,pob,nationality,maritalstatus,insnb,pPhoneNumber,pCity,pStreet,pBuilding,pFloor,pRegion,bac,bacnumber,school,degrees,degreesnumbers,degreesyears,otherdegreeslevels,otherdegreesnames,otherdegreesnumbers,otherdegreesyears,branch,taughtmajors ,languages,taughtyears ,taughtcourses)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $link->prepare($sql);
if (!$stmt) {
    die("Error in preparing statement: " . $link->error);
}
$result = $link->query("SELECT COUNT(*) AS count FROM professors");
$row = $result->fetch_assoc();
$count = $row['count'] + 1; 
$siscode = "P" . $count;

$_SESSION['siscode'] = $siscode;

$fname = $professor->fname;
$lname = $professor->lname;
$email = $professor->email;
$gender = $professor->gender;
$dob = $professor->dob;
$pob = $professor->pob;
$nationality = $professor->nationality;
$maritalstatus = $professor->maritalstatus;
$insnb = $professor->insnb;
$pPhoneNumber = $professor->pPhoneNumber;
$pCity = $professor->pCity;
$pStreet = $professor->pStreet;
$pBuilding = $professor->pBuilding;
$pFloor = $professor->pFloor;
$pRegion = $professor->pRegion;
$bac = $professor->bac;
$bacnumber = $professor->bacnumber;
$school = $professor->school;
$degrees = implode(", ", $professor->degrees);
$degreesnumbers = implode(", ", $professor->degreesnumbers);
$degreesyears = implode(", ", $professor->degreesyears);

if(isset($otherdegreeslevels))
$otherdegreeslevels = implode(", ", $professor->otherdegreeslevels);

if(isset($otherdegreesnames))
$otherdegreesnames = implode(", ", $professor->otherdegreesnames);

if(isset($otherdegreesnumbers))
$otherdegreesnumbers = implode(", ", $professor->otherdegreesnumbers);

if(isset($otherdegreesyears))
$otherdegreesyears = implode(", ", $professor->otherdegreesyears);

$branch = $professor->branch;
$taughtmajors = implode(", ", $professor->taughtmajors);
$languages = serialize($professor->languages);
$taughtyears = serialize($professor->taughtyears);
$taughtcourses = serialize($professor->taughtcourses);

$stmt->bind_param("sssssssssisssssssssssssssssssss", $siscode,$fname,$lname,$email,$gender,$dob,$pob,$nationality,$maritalstatus,$insnb,$pPhoneNumber,$pCity,$pStreet,$pBuilding,$pFloor,$pRegion,$bac,$bacnumber,$school,$degrees,$degreesnumbers,$degreesyears,$otherdegreeslevels,$otherdegreesnames,$otherdegreesnumbers,$otherdegreesyears,$branch,$taughtmajors ,$languages,$taughtyears ,$taughtcourses);

if ($stmt->execute()) {
   
} else {
  
}

$stmt->close();
$link->close();



?> 
        <div class="button_container">
            <input type="submit" name="back" value="BACK" style="color: white;text-decoration: none;"
                class="form__button button submit" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="next" value="SIGN UP" style="color: white;text-decoration: none;"
                class="form__button button submit" />
        </div>
        </center>
    </form>
    </div>
</body>



</html>


