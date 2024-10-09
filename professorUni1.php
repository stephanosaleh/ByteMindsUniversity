<?php

include_once('initSession.php');


if(isset($_POST['back'])) {
    header('Location:professorEducational.php');
}

$branch=$taughtmajors=$languages="";
$error="";
$emptym=$emptyl="";


if(isset($_POST['branch'])) {
    $branch=$_POST['branch'];
}

if(isset($_POST['next'])) {
    $taughtmajors=$_POST['taughtmajors'];
    $languages=$_POST['languages'];

    if(empty($branch)) {
        $error="* Required";
    }

    else {
        if(!empty($taughtmajors)) {
            if(!empty($languages)) {
                $professor->branch=$branch;
                $professor->taughtmajors=$taughtmajors;
                $professor->languages=$languages;
                $_SESSION['professor'] = $professor;
                header('Location:professorUni2.php');
            }
            else {
                $emptyl="*";
            }
        }
        else {
            $emptym="*";
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
            width: 1000px;
            min-width: 1000px;
            min-height: 450px;
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


</head>

<body>


    <div class="main">
    <form method="post" action="">
    </br></br></br>
    
    <h1 style="text-align:center; color:black;">BMU</h1></br></br>
    <center>

    <?php 
    echo '<span style="color: red;">' . $error . '</span>';
    ?>

    </br></br>
    <select style="width:15%;" name="branch" id="branch">
    <option value="" disabled selected>Select a branch</option>
    <option value="Hadath" <?php echo ($branch == 'Hadath') ? 'selected' : ''; ?>><?php echo $branch1->name;?></option>
    <option value="Akkar" <?php echo ($branch == 'Akkar') ? 'selected' : ''; ?>><?php echo $branch2->name;?></option>
    <option value="Koura" <?php echo ($branch == 'Koura') ? 'selected' : ''; ?>><?php echo $branch3->name;?></option>
    </select>
    </br></br>

   
    <div id="branchinfo"></div></br></br>

    <div style="color:black;" id="checkboxes-container"></div></br></br></br>

    <div style="color:black;" id="languages-container"></div></br>

    <script>
    var selectedMajors = <?php echo json_encode($professor->taughtmajors); ?>;
    var selectedLanguages = <?php echo json_encode($professor->languages); ?>;

    function updateContent(branch) {
        var branchinfo = document.getElementById('branchinfo');
        var checkboxesContainer = document.getElementById('checkboxes-container');

        if (branch) {
            switch (branch) {
                case 'Hadath':
                    displayBranchInfo(<?php echo json_encode($branch1); ?>);
                    displayCheckboxes(<?php echo json_encode($professor->degrees); ?>, selectedMajors);
                    displayLanguages(selectedLanguages);
                    break;
                case 'Akkar':
                    displayBranchInfo(<?php echo json_encode($branch2); ?>);
                    displayCheckboxes(<?php echo json_encode($professor->degrees); ?>, selectedMajors);
                    displayLanguages(selectedLanguages);
                    break;
                case 'Koura':
                    displayBranchInfo(<?php echo json_encode($branch3); ?>);
                    displayCheckboxes(<?php echo json_encode($professor->degrees); ?>, selectedMajors);
                    displayLanguages(selectedLanguages);
                    break;
                default:
                    checkboxesContainer.innerHTML = '';
                    document.getElementById('languages-container').innerHTML = '';
                    break;
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        var branchSelect = document.getElementById('branch');
        var selectedBranch = branchSelect.value;
        updateContent(selectedBranch);
    });

    function displayBranchInfo(branchInfo) {
        var branchinfo = document.getElementById('branchinfo');

        var htmlContent = `
            <p>Address: ${branchInfo.address}</p><br>
            <p>Email: ${branchInfo.email}</p><br>
            <p>Phone: ${branchInfo.phone}</p><br>
        `;

        branchinfo.innerHTML = htmlContent;
    }

    function displayCheckboxes(degrees, selectedMajors) {
        var checkboxesContainer = document.getElementById('checkboxes-container');

        checkboxesContainer.innerHTML = '';

        if (degrees.length > 0) {
            var majors = document.createElement('h4');
            majors.innerText = 'Majors';
            majors.style.textAlign = 'center';
            majors.style.color = 'black';
            checkboxesContainer.appendChild(majors);
            checkboxesContainer.appendChild(document.createElement('br'));

            degrees.forEach(function (degree) {
                var checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.name = 'taughtmajors[]';
                checkbox.value = degree;
                checkbox.id = 'degree_' + degree;
                checkbox.style.marginLeft = '20px';
                checkbox.style.marginRight = '5px';
                checkbox.checked = selectedMajors.includes(degree);

                var label = document.createElement('label');
                label.htmlFor = 'degree_' + degree;
                label.appendChild(document.createTextNode(degree));

                checkboxesContainer.appendChild(checkbox);
                checkboxesContainer.appendChild(label);
            });
        }
    }

    function displayLanguages(selectedLanguages) {
        var languagesContainer = document.getElementById('languages-container');

        languagesContainer.innerHTML = '';

        var languagesHeader = document.createElement('h4');
        languagesHeader.innerText = 'Languages';
        languagesHeader.style.textAlign = 'center';
        languagesHeader.style.color = 'black';
        languagesContainer.appendChild(languagesHeader);
        languagesContainer.appendChild(document.createElement('br'));

        var englishCheckbox = document.createElement('input');
        englishCheckbox.type = 'checkbox';
        englishCheckbox.name = 'languages[]';
        englishCheckbox.value = 'English';
        englishCheckbox.id = 'english';
        englishCheckbox.style.marginLeft = '20px';
        englishCheckbox.style.marginRight = '5px';
        englishCheckbox.checked = selectedLanguages.includes('English');

        var englishLabel = document.createElement('label');
        englishLabel.htmlFor = 'english';
        englishLabel.appendChild(document.createTextNode('English'));

        languagesContainer.appendChild(englishCheckbox);
        languagesContainer.appendChild(englishLabel);

        var frenchCheckbox = document.createElement('input');
        frenchCheckbox.type = 'checkbox';
        frenchCheckbox.name = 'languages[]';
        frenchCheckbox.value = 'French';
        frenchCheckbox.id = 'french';
        frenchCheckbox.style.marginLeft = '20px';
        frenchCheckbox.style.marginRight = '5px';
        frenchCheckbox.checked = selectedLanguages.includes('French');

        var frenchLabel = document.createElement('label');
        frenchLabel.htmlFor = 'french';
        frenchLabel.appendChild(document.createTextNode('French'));

        languagesContainer.appendChild(frenchCheckbox);
        languagesContainer.appendChild(frenchLabel);
    }

    document.getElementById('checkboxes-container').addEventListener('change', function () {
        updateSelectedMajors();
    });

    document.getElementById('languages-container').addEventListener('change', function () {
        updateSelectedLanguages();
    });

    document.getElementById('branch').addEventListener('change', function () {
        var branch = this.value;
        updateContent(branch);
    });

    function updateSelectedMajors() {
        selectedMajors = Array.from(document.querySelectorAll('input[name="taughtmajors[]"]:checked')).map(checkbox => checkbox.value);
    }

    function updateSelectedLanguages() {
        selectedLanguages = Array.from(document.querySelectorAll('input[name="languages[]"]:checked')).map(checkbox => checkbox.value);
    }

    updateSelectedMajors();
    updateSelectedLanguages();
</script>

   
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

