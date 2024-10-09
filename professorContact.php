<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
	
    <meta charset="utf-8">
    <title>Professor Contact Information</title>
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
  min-height:00px;
  height: 620px;
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
  width: 200px;
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
p.error {
        color: red;
        margin-bottom: 5px;
    }
</style>
  </head>
  <body>
  
 <?php

include_once('initSession.php');

$pPhoneNumber = $pCity = $pStreet = $pBuilding = $pFloor = $pRegion = "";
$error="";
$empty="";

function validatePhoneNumber($phoneNumber) {
    $pattern = '/^(70|71|76|78|81|79|03)(\d{6})$/';
    return preg_match($pattern, $phoneNumber);
}

function validateOnlyCharacters($input) {
    return ctype_alpha($input);
}


    if (isset($_POST['back'])) {
        header('Location: professorPersonal.php');
        exit();
    }

    if (isset($_POST['next'])) {
        $pPhoneNumber = $_POST["pPhoneNumber"];
        $pCity = $_POST["pCity"];
        $pStreet = $_POST["pStreet"];
        $pBuilding = $_POST["pBuilding"];
        $pFloor = $_POST["pFloor"];
        $pRegion = isset($_POST['pRegion']) ? $_POST['pRegion'] : '';

        if (!empty($pPhoneNumber) && !empty($pCity) && !empty($pStreet) && !empty($pBuilding) && !empty($pFloor) && !empty($pRegion)) { 
            
          if(validatePhoneNumber($pPhoneNumber) && validateOnlyCharacters($pCity) && is_numeric($pFloor)) {
            $professor->pPhoneNumber= $pPhoneNumber;
            $professor->pRegion=$pRegion;
            $professor->pCity= $pCity;
            $professor->pStreet=$pStreet;
            $professor->pBuilding=$pBuilding;
            $professor->pFloor=$pFloor;
            $_SESSION['professor'] = $professor;
            header('Location: professorEducational.php');
          }  

          if(!is_numeric($pFloor)) {
            $error="* Floor must only contain digits";
          }

            if (!validateOnlyCharacters($pCity)) {
                $error="* City cannot contain digits";
            }
            
            
            if (!validatePhoneNumber($pPhoneNumber)) {
              $error="* Invalid Phone Number format";
            }

            
                
        } else{
          $empty="*";
        }
    }

?>
  <center>
	<form method="post" action="">
  <div class="main">
	 <h2 class="switch__title title">Contact Information</h2><br/>
	 <div>
		  <label>
		  <input type="text" class= "form__input" name="pPhoneNumber" placeholder="Phone number <?php echo $empty;?>" value="<?php echo $pPhoneNumber;?>"><br>     
		  <select name="pRegion" class= "form__input" placeholder="Region" id="pRegion">
		  <option value="" disabled selected>Select Region <?php echo $empty;?></option>
		  <option value="Akkar" <?php echo ($pRegion == 'Akkar') ? 'selected' : ''; ?>>Akkar</option>
		  <option value="Baalbek-Hermel" <?php echo ($pRegion == 'Baalbek-Hermel') ? 'selected' : ''; ?>>Baalbek-Hermel</option>
		  <option value="Beirut" <?php echo ($pRegion == 'Beirut') ? 'selected' : ''; ?>>Beirut</option>
		   <option value="Beqaa" <?php echo ($pRegion == 'Beqaa') ? 'selected' : ''; ?>>Beqaa</option>
		  <option value="Mount Lebanon" <?php echo ($pRegion == 'Mount Lebanon') ? 'selected' : ''; ?>>Mount Lebanon</option>
		  <option value="Nabatiye" <?php echo ($pRegion == 'Nabatiye') ? 'selected' : ''; ?>>Nabatiye</option>
	      <option value="North" <?php echo ($pRegion == 'North') ? 'selected' : ''; ?>>North</option>
		  <option value="South" <?php echo ($pRegion == 'South') ? 'selected' : ''; ?>>South</option>
		  </select><br>
		  <input type="text" class= "form__input" name="pCity" placeholder="City <?php echo $empty;?>" value="<?php echo $pCity;?>"><br>
		  <input class= "form__input" class= "form__input" type="text" name="pStreet" placeholder="Street <?php echo $empty;?>" value="<?php echo $pStreet;?>"><br>
		  <input type="text" class= "form__input" name="pBuilding" placeholder="Building <?php echo $empty;?>" value="<?php echo $pBuilding;?>"><br>
		  <input type="text" class= "form__input" name="pFloor" placeholder="Floor <?php echo $empty;?>" value="<?php echo $pFloor;?>">
		  <br>
    </div></br>
    <?php echo "<p style='color:red;'>".$error."</p>"; ?>
    <a href="professorPersonal.php" style="color:white;text-decoration: none;"><button  class="form__button button submit" type="submit" name="back">Back </a></button>
          &nbsp;&nbsp;&nbsp;
    <input type="submit" name="next" value="Next" style="color: white;text-decoration: none;" class="form__button button submit"/>
          
  </div>
  </form>
  </center>
  </body>
</html>
				