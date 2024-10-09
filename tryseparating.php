<?php

include_once('initSession.php');


if(isset($_SESSION['siscode'])) {
    
    $siscode = $_SESSION['siscode'];
    

}
?>

<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "softpr";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT * FROM professors WHERE siscode = ?");
$stmt->bind_param("s", $_SESSION['siscode']);
    $stmt->execute();
	$result = $stmt->get_result();
	 $row = $result->fetch_assoc();

$stmt->close();
$conn->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
:root{
    
    --primary-color: #0E4BF1;
    --panel-color: #FFF;
    --text-color: #000;
    --black-light-color: #707070;
    --border-color: #e6e5e5;
    --toggle-color: #DDD;
    --box1-color: #4DA3FF;
    --box2-color: #FFE6AC;
    --box3-color: #E7D1FC;
    --title-icon-color: #fff;
    
    
    --tran-05: all 0.5s ease;
    --tran-03: all 0.3s ease;
    --tran-03: all 0.2s ease;
}
body{
    min-height: 100vh;
}
.content {
    margin-left: 280px; 
}
nav{
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 250px;
    padding: 10px 14px;
   
    border-right: 1px solid var(--border-color);
    transition: var(--tran-05);
}

nav.close{
    width: 73px;
}
nav .logo-name{
    display: flex;
    align-items: center;
}
nav .logo-image{
    display: flex;
    justify-content: center;
    min-width: 45px;
}
nav .logo-image img{
    width: 40px;
    object-fit: cover;
    border-radius: 50%;
}
nav .logo-name .logo_name{
    font-size: 22px;
    font-weight: 600;
    color: var(--text-color);
    margin-left: 14px;
    transition: var(--tran-05);
}
nav.close .logo_name{
    opacity: 0;
    pointer-events: none;
}
nav .menu-items{
    margin-top: 40px;
    height: calc(100% - 90px);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.menu-items li{
    list-style: none;
}
.menu-items li a{
    display: flex;
    align-items: center;
    height: 50px;
    text-decoration: none;
    position: relative;
}
.nav-links li a:hover:before{
    content: "";
    position: absolute;
    left: -7px;
    height: 5px;
    width: 5px;
    border-radius: 50%;
    background-color: var(--primary-color);
}
body.dark li a:hover:before{
    background-color: var(--text-color);
}
.menu-items li a i{
    font-size: 24px;
    min-width: 45px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
   
   color: var(--black-light-color);
}


.menu-items li a .link-name{
    font-size: 18px;
    font-weight: 400;
   
    transition: var(--tran-05);
    color: var(--black-light-color);
}

nav.close li a .link-name{
    opacity: 0;
    pointer-events: none;
}
.nav-links li a:hover i,
.nav-links li a:hover .link-name{
    color: var(--primary-color);
}
.menu-items .logout-mode{
    padding-top: 10px;
    border-top: 1px solid var(--border-color);
}
.menu-items .mode{
    display: flex;
    align-items: center;
    white-space: nowrap;
}
.menu-items .mode-toggle{
    position: absolute;
    right: 14px;
    height: 50px;
    min-width: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}
.mode-toggle .switch{
    position: relative;
    display: inline-block;
    height: 22px;
    width: 40px;
    border-radius: 25px;
    background-color: var(--toggle-color);
}
.switch:before{
    content: "";
    position: absolute;
    left: 5px;
    top: 50%;
    transform: translateY(-50%);
    height: 15px;
    width: 15px;
    background-color: var(--panel-color);
    border-radius: 50%;
    transition: var(--tran-03);
}



.nav-links li a.selected i,
.nav-links li a.selected .link-name {
    color: var(--primary-color);
}

.nav-links li a.selected:before {
    content: "";
    position: absolute;
    left: -7px;
    height: 5px;
    width: 5px;
    border-radius: 50%;
    background-color: var(--primary-color);
}
.circle {
            display: inline-block;
            line-height: 20px;
            border-radius: 5px;
            text-align: center;
            background-color: #ccc;
			font-size:16px;
        }

 .sub-menu {
    display: none;
    position: absolute;
    background-color: #fff;
    padding: 38px;
    border: 2px solid #683df5;
    z-index: 1;
}

.sub-menu li {
    margin-bottom: 5px;
}

.nav-links li:hover .sub-menu {
    display: block;
} 
td.zoom:hover {
    transform: scale(1.08); /* 20% zoom in */
    transition: transform 0.2s; /* smooth transition */
}
.my-button {
    padding: 5px ; 
    font-size: 16px; 
    background-color: white;
    color: #0E4BF1; 
    border: 1px solid #0E4BF1; 
    border-radius: 5px; 
    cursor: pointer; 
    transition: background-color 0.3s; 
	font-size:18px;
}

.my-button:hover {
    background-color: #0E4BF1;
	color:white;
}
   </style>
   
   
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Professor Dashboard</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="logo.png" alt="">
            </div>
            <span class="logo_name">Byte Minds University</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="proffProfile.php">
                    <i class="uil-user"></i>
                    <span class="link-name">Profile</span>
                </a></li>
				
                <li><a href="profProgram.php">
                    <i class="uil-book"></i>
                    <span class="link-name">Program</span>
                </a></li>
				
                <li><a href="profCourses.php">
                    <i class="uil-file-alt"></i>
                    <span class="link-name">Courses</span>
                </a></li>
				
                <li><a href="profGrading.php">
                    <i class="uil-file-alt"></i>
                    <span class="link-name">Grading</span>
                </a></li>
                
                <li><a href="profAnnoucements.php">
                    <i class="uil-assistive-listening-systems"></i>
                    <span class="link-name">Annoucements</span>
                </a></li>
                <li><a href="profFeedback.php">
                    <i class=" uil-comment-lines"></i>
                    <span class="link-name">Feedback</span>
                </a></li>
                

            </ul>
            <ul class="nav-links">
                <li><a href="#section7">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Log Out</span>
                </a></li>
                <li><a href="#section8">
                    <i class=" uil-times"></i>
                    <span class="link-name">Quit</span>
                </a></li>
            </ul>
        </div>
    </nav>
    <section class="content" id="section1"><br>
        <p  style="text-indent:5px; color:white; font-size:20px; background-color:#0E4BF1; border-radius:5px;">Profile</p>
		<br>
		<table cellspacing=20 >
		<tr><td>
		<img src="proficon.png" height=130 width=140>
		<td>
		<div style="margin-left: 70px">
		<p style="color:#0E4BF1; font-size:22px;"><i><b>Professor  <?php echo $row["fname"] . " " . $row["lname"] ."<br> "; ?></p></b></i><br>
		<p style="font-size:15px"><?php echo  "<b>Email: </b>" .$row["email"] . " <br><b>  Phone Number: </b>" . $row["pPhoneNumber"]  ."<br><b> Location: </b>". $row["pCity"] ."<br><b> Nationality: </b>". $row["nationality"] ."<br> "; ?>	 
		</p>
		<br>
		</table>
		<p style="text-indent:5px;color:white; background-color:#0E4BF1;font-size:18px;border-radius:5px;">Biography</p><br>
		<div style="font-size:16px";><b>
		<?php echo $row["fname"]. " " .$row["lname"]. " is a professor at Byte Minds University having degree(s) in : " ?>
		<?php foreach($result as $row){
		echo $row["degrees"]. "."; }
		$unserializedyears = unserialize($row["taughtyears"]);
		echo " With ";
		foreach ($unserializedyears as $value) {
			echo $value. " years ";
		};
		echo " of experience in academia, Professor " .$row["lname"]. " brings a wealth of knowledge and expertise to the university community.";
		?></b></div>
		</div>		
		<br>
		<table>
		<tr>
        <td style="padding: 10px;padding-right: 180px;" rowspan="2">
	    <table style="font-size:16px" cellspacing=15>
		<tr>
		<td colspan=2 style="color:white; background-color:#0E4BF1; font-size:18px;border-radius:5px;"><center>Personals<center></td>
		<tr><b>
		<?php echo "<td><span class='circle'> Gender: </span> ".$row["gender"] .  "</td><tr><td><span class='circle'>  Birthday: </span> " . $row["dob"]  ."</td><tr><td><span class='circle'> Place of Birth: </span> ". $row["pob"] ."</td><tr><td><span class='circle'> Marital Status: </span> ". $row["maritalstatus"] ; ?>
		</tr>
		</tr>
		</table>
        </td>
        <td>
		<table style="padding: 10px;"cellspacing=8><tr><td colspan=4 style="color:white; background-color:#0E4BF1; font-size:18px;border-radius:5px;"><center>Residence<center></td>
		<tr><b>
		<?php echo  "<td><span class='circle'>Region: </span> " .$row["pRegion"] . "</td><td><span class='circle'>Street: </span> ". $row["pStreet"] ."</td><tr><td><span class='circle'>  Building: </span> " . $row["pBuilding"]  ."</td><td><span class='circle'> Floor: </span> ". $row["pFloor"] ."</td></tr></table> "; ?>
		</tr></tr>
        </td>
		</tr>
		<tr>
        <td>
		<table style="padding: 10px;" cellspacing=8>
		<tr><td colspan=2 style="color:white; background-color:#0E4BF1; font-size:18px;border-radius:5px;"><center>Education<center></td>
		<tr>
		<?php 
		echo  "<td><span class='circle'>School: </span><b> " .$row["school"] . "</td><td></b><span class='circle'>  Degree Number: </span><b> " . $row["degreesnumbers"]  ."</td></b>";
		?></td>
			</table>
        </td>
    </tr>
</table>
		
    </section>
    <section class="content" id="section2" style="display:none;">
        <h1>Program</h1>
        <p>Content for Program section goes here.</p>
    </section>
	
	
    <section class="content" id="section3" style="display:none;">
	<form method='post'>
	<?php 
			$message=" ";
			$original= $row["taughtcourses"];
			$data = unserialize($row["taughtcourses"]);
			
			session_start();
			$_SESSION["tcourses"]=$original;
			$fieldToEmpty = "taughtcourses";
			$course_id = $row["siscode"];
			$oldcourses=$_SESSION["tcourses"];
			$ritz="bye";
			
			if (isset($_POST['delete'])){
			$byecourse=$_POST['delete'];
			$elementToDelete = $byecourse;
			$key = array_search($elementToDelete, $data);
			if ($key !== false) {
			unset($data[$key]);
			$new=serialize($data);
			$message= "Course '$elementToDelete' was successfully deleted.";
	} else {
			$message= "Course '$elementToDelete' was not found in the list of courses.";
}		
		$conn = new mysqli($servername, $username, $password, $dbname);	
		$sql = "UPDATE professors SET $fieldToEmpty = ' ' WHERE siscode = '$course_id'";
		$sql = "UPDATE professors SET $fieldToEmpty = '$new' WHERE siscode = '$course_id'";
		mysqli_query($conn, $sql);
		
	}	
		echo "<table cellspacing=20><th style='font-size:24px;padding: 14px;'>Courses </th>";
        foreach ($data as $value) {
			echo "<tr><td class='zoom' style='font-size:18px;padding-right: 80px;background-color:#0E4BF1;color:white; text-indent:4px;border-radius:5px;'>".$value. "</td><td ><button class='my-button' style='font-size:18px;' type='submit' value='" . $value . "' name='delete' >Delete</button></td>";
		};    
		echo "<tr><td><i>".$message."</i></td></tr></table>";	
	?>
	
	<!-- Adding the course -->
	<?php 
	$message2= " ";

	if (isset($_POST['add'])){

		$fieldToEmpty="taughtcourses";
		$course_id = $row["siscode"];
		$original= $row["taughtcourses"];
		$addedc=$_POST['addedcourse'];
		$unserializedData = unserialize($row["taughtcourses"]);
		
		session_start();
			$_SESSION["tcourses"]=$original;
		$oldcourses=$_SESSION["tcourses"];
		if(array_push($unserializedData, $addedc)>0){
			$message2= "Course '$addedc' was successfully added. ";
		}
		else {
			$message2="Course '$addedc' was not added";
		};
		$newarray=serialize($unserializedData);
		$conn = new mysqli($servername, $username, $password, $dbname);	
		$sql = "UPDATE professors SET $fieldToEmpty = ' ' WHERE siscode = '$course_id'";
		$sql = "UPDATE professors SET $fieldToEmpty = '$newarray' WHERE siscode = '$course_id'";
		mysqli_query($conn, $sql);
	}
	?>
	<br>
	<p style='font-size:20px'><b>You may add a new course to your curriculum</b>  </p><br>
	<table cellspacing=18 style="font-size:16px;border-radius:10px"><th colspan=2 style="color:white;background-color:#0E4BF1 ;border-radius:5px;font-size:18px;">Add New Course</th>
	<tr><td style="padding-right: 60px">Course Title</td>
	<td><input type="text" placeholder="Course Title" style="font-size:16px" name="addedcourse" id="addedcourse">
	<td style="padding-left: 30px">
	<button class='my-button' style='font-size:18px;' type='submit' name='add' id="add">Add</button></td>
	
	</table>
	<br>
	<span style="font-size:16px;"><i><?php echo $message2; ?></i></span>
	
	</section>
    <section class="content" id="section4" style="display:none;">
        <h1>Grades</h1>
        <p>Content for Grades section goes here.</p>
    </section>
    <section class="content" id="section5" style="display:none;">
        <h1>Annoucements</h1>
        <p>Content for Annoucement section goes here.</p>
    </section>
    <section class="content" id="section6" style="display:none;">
        <h1>Feedback</h1>
        <p>Content for Feedback section goes here.</p>
    </section>
    <section class="content" id="section7" style="display:none;">
        <h1>Logout</h1>
        <p>Content for Logout section goes here.</p>
    </section>
    <section class="content" id="section8" style="display:none;">
        <h1>Quit</h1>
        <p>Content for Quit section goes here.</p>
    </section>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    const body = document.querySelector("body"),
        sidebar = body.querySelector("nav"),
        navLinks = body.querySelectorAll(".nav-links a"),
        logoutLink = body.querySelector(".logout-mode a[href='#section7']"),
        dropOutLink = body.querySelector(".logout-mode a[href='#section8']");

    let getMode = localStorage.getItem("mode");
    if (getMode && getMode === "dark") {
        body.classList.toggle("dark");
    }

    let getStatus = localStorage.getItem("status");
    if (getStatus && getStatus === "close") {
        sidebar.classList.toggle("close");
    }

    function showContent(sectionId) {
        var contents = document.querySelectorAll(".content");
        contents.forEach(function(content) {
            content.style.display = "none";
        });
        var section = document.getElementById(sectionId);
        if (section) {
            section.style.display = "block";
        }
    }

   
    showContent("section1");
    
    
    const profileLink = document.querySelector(".nav-links a[href='proffProfile.php']");
    if (profileLink) {
        profileLink.classList.add("selected");
    }

    navLinks.forEach(function(link) {
        link.addEventListener("click", function(event) {
            event.preventDefault(); 
            var sectionId = link.getAttribute("href").substring(1);
            showContent(sectionId);
            
            navLinks.forEach(function(link) {
                link.classList.remove("selected");
            });
           
            link.classList.add("selected");
        });
    });

    logoutLink.addEventListener("click", function(event) {
        event.preventDefault();
       
        console.log("Logout clicked");
    });

    dropOutLink.addEventListener("click", function(event) {
        event.preventDefault();
      
        console.log("Drop Out clicked");
    });
});
</script>





</body>
</html>
