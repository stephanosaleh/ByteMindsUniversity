<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Online Support</title>
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
  color: white;
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
  left: -100px;
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

	.transparent-button2 {
      background-color: navy;
      color: white;
      padding: 10px 20px;
      border: solid white 1;
      border-radius: 45px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 18px;
	  font-weight: bold;
      margin: 10px;
      cursor: pointer;
	  padding:20px;
	  
    }
	.transparent-button {
      background-color: navy;
      color: white;
      padding: 10px 20px;
      border: solid white 1;
      border-radius: 45px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
	  font-weight: bold;
      margin: 10px;
      cursor: pointer;
	  padding:16px;
	  
    }

    .transparent-button:hover {
      background-color: rgba(0, 0, 0, 0.2); /* Adjust the alpha value on hover */
    }
	</style>
	
	<body>
	<form method="post" action="">
	<div class="main">
    <div class="container a-container" id="a-container">
	<div class="square">
	<center>
	<div class="switch" id="switch-cnt">
	<div class="switch__circle switch__circle--t"></div>
        <div class="switch__container" id="switch-c1">
          <h2 class="switch__title title">Online Support</h2>
	
	<br><br>
	<p class="switch__description description">
	<label>How can we help?
	<br><br>
	
	<select name="help">
	<option value="*****">*****</option>
	<option value="invalidoption">Invalid date of birth</option>
	<option value="forgotCode">I forgot my sis code</option>
	<option value="changeEmail">I want to change my email  address</option>
	
	<option value="Other">Other</option>
	</select></label></p>
	
	
	<center><br>
	<p class="switch__description description">
	<label>Tell us more...</p>
	<br>
	<textarea id="description" name="description" rows="4" cols="30"></textarea>
	<br><br><br>
	<button type="submit" class="transparent-button2" name="req"><b>Request help</b></button>
	<br><br>
	
	
	<?php
			$message2 = "Please choose an option";
			$message = "Tell us more";
			
			if(isset($_POST['req'])){
			$option=$_POST['help'];
			
			if ($option=="Other"){
				
				header("Location:support2.php");
				}
				else if ($option=="*****"){
				echo "<p style='font-size: 16px; letter-spacing: 0.25px; color:red';>".$message2."</p>";
				}
				else{
					$message = "We will fix this...";
				echo "<p style='font-size: 16px; letter-spacing: 0.25px; color:navy';>".$message."</p>";
				}
			}
?>
<br><br>
<a href="mainPage.php" button class="transparent-button" >Back to main</a></button>

	
	</div>
	</body>
	</html>
	