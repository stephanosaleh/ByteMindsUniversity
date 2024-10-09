<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    
	body {
      margin: 0;
      font-family: "Montserrat", sans-serif;
      background-color: #D2D8E3 ;
	  font-size:22px;
    }

    .navbar {
      background-color: rgba(255, 255, 255, 0.8); /* Set the background color with transparency */
      border-radius: 45px; /* Set the border-radius for a curved appearance */
      overflow: hidden;
	  width:82%;
	   text-align: center;
	   align:center;
	   margin: 20px auto;
	   position:fixed;
	   transition: top 0.3s;
	   transform: translateX(10%) translateY(0%);
	   z-index: 1000;
    }

    .navbar a {
      float: left;
      display: block;
      color: #333;
      text-align: center;
      padding: 25px 25px;
      text-decoration: none;
	  
    }

	.navbar a:hover {
      background-color: #ddd;
      color: black;
	  border-radius: 30px;
    }
	
	.navbar .normal-space {
      margin-right: 40px; /* Default spacing between buttons */
	  margin-top:10px;
	  margin-bottom:10px;
    }

    .navbar .wide-space {
      margin-right: 185px; /* Larger spacing between specific buttons */
	  margin-top:10px;
	  margin-bottom:10px;
    }
	
	.navbar a.special-button {
      background-color: navy; /* Green background color */
      color: white; /* White text color */
      border-radius: 35px; /* Rounded corners */
	    /* Larger spacing between specific buttons */
	  margin-top:10px;
	  margin-bottom:10px;
		color:white;
		font-weight:bold;
    }
	
    }
	.navbar a:first-child {
      margin-right: 120px; /* Larger spacing between specific buttons */
	  margin-top:10px;
	  margin-bottom:10px;
	  margin-left:20px;
    }
	.firstpart{
		color:black;
		font-size:52px;
		margin-top:100px;
		margin-bottom:100px;
		font-weight:bold;	
		text-align:justify;
	}
	
	.secondpart{
		color:black;
		font-size:22px;
		text-align:justify;
		margin-bottom:150px;
		
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
      font-size: 32px;
      margin: 10px;
      cursor: pointer;
	  padding:22px;
	  
    }

    .transparent-button:hover {
      background-color: rgba(0, 0, 0, 0.2); /* Adjust the alpha value on hover */
    }

		
	.container {
      width: 100%;
      overflow: hidden; /* Clear the float */
	}

    .left-div {
      float: left; /* Float the left div to the left */
      width: 50%; /* Set the width of the left div */
	  margin-left:60px;

    }

    .right-div {
      float: right; /* Float the right div to the left */
      width: 50%; /* Set the width of the right div */

    }

    .image-container img {
      width: 90%; /* Make the image take up 100% of the width of its container */
      height: 90%; /* Maintain the aspect ratio of the image */
      perspective: 1000px;
    }
	
	.image-3d {
      width: 450px;
      height: 300px;
      transform: rotateY(20deg); /* Adjust the rotation angle as needed */
      transition: transform 0.5s ease; /* Add a smooth transition effect */
	  border-radius: 45px;

    }
	.image-3dd {
      width: 550px;
      height: 380px;
      transform: rotateY(20deg); /* Adjust the rotation angle as needed */
      transition: transform 0.5s ease; /* Add a smooth transition effect */
	  border-radius: 45px;
    }
	
	.image-container2 img {
      width: 400px; 
      height: 350px; 
      
    }
	.imagecontact {
      width: 450px;
      height: 300px;
	  border-radius: 45px;
    }

    .image-3d:hover {
      transform: rotateY(30deg); /* Adjust the rotation angle on hover */
    }
	
	
	.container2 {
      display: flex;
      flex-wrap: wrap; /* Allow wrapping to the next line when necessary */
	  margin-top:50px;
	  margin-left:50px;
    }

    .box2 {
      width: 45%; /* Set the width for each box */
      margin: 10px;
      padding: 20px;
      box-sizing: border-box; /* Include padding and border in the box dimensions */
	  border-radius: 40px;
	  margin-left:30px;
    }
	
	.container3 {
      flex-wrap: wrap; /* Allow wrapping to the next line when necessary */
	  margin-top:50px;
	  text-align: center;
	  font-size:48px;
	  font-weight:bold;
    }
	.social-icons {
      text-align: center;
      padding: 20px;
    }

    .social-icons a {
      display: inline-block;
      margin: 0 10px;
      text-decoration: none;
      color: #333; /* Set the color of the icons */
    }

    .social-icons i {
      font-size: 30px; /* Set the font size of the icons */
    }

    /* Adjust the color and style of the icons as needed */
    .fa-facebook { color: #1877f2;}
    .fa-linkedin { color: #e1306c; }
    .fa-twitter { color: #1da1f2; }
    
	
	 .container {
	 display: flex;
	 text-align: center; /* Center its children horizontally */
      padding: 20px; /* Optional padding for better visualization */
    }
      
    .centered-image {
      display: block; /* Make the image a block element */
      margin: auto; /* Center the image horizontally */
	  border-radius:35px;
	  transition: opacity 0.7s ease;
    }
	
	.overlay-text {
	  font-family: "Courier New", Courier, monospace;
	  font-size:22px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: black;
      opacity: 0; /* Initially hidden */
      transition: opacity 0.4s ease; /* Add a smooth transition effect for opacity */
    }
	
	.shadowc {
      position: relative;
      margin: 0 auto; 
    }
	
	.shadowc:hover .centered-image {
     opacity: 0.2; /* Fade the image on hover */
    }

    .shadowc:hover .overlay-text {
     opacity: 1; /* Show the text on hover */
    }
	
	section {
      height: 80vh;
      display: flex;	
    }

     #section1 {  }
     #section2 {  }
     #section3 {  }
	
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>

<body>
<section id="section1">
<nav class="navbar" id ="navbar">
  <a href="#section1" class="wide-space" style="margin-left:15px">B M U</a>
  <a href="#section2" class="normal-space"><b>About</a>
  <a href="#section4" class="normal-space"><b>Contact</a>
  <a href="support1.php" class="wide-space"><b>Support</a>
  <a href="index.php" class="special-button">Join Us</a>
</nav>

<center>
<br><br><br><br><br>
<div class="container">
  <div class="left-div">
    <div class="firstpart"> 
	 <center>Navigate The Future</center>
		<br>
<span class="secondpart"> 
	Embrace the evolved era of the digital world and elevate your computer science skills and expertise at "Byte Minds" where the convergence of innovation and education takes place.

</div>
  </div>
  
  <div class="right-div">
  <div class="image-container">
  <br><br><br>
    <img src="2.png" alt="Your Image Description" class="image-3d">
  </div>
</div>
</div><br>
</section>

<br><br><br><br><br>

<center><a href="index.php" button class="transparent-button">Get Started</a></center>
<br>
<section id="section2">
<div class="container2">
  <div class="box2">
    <p><br><img src="img2.jpg" class="image-3dd"></p>
  </div>
  <div class="box2" >
    <h1 style="text-align:left ; font-size:46px;">Welcome to Byte Minds</h1><br>
    <p style="text-align:justify">We're commited to providing students with a cutting-edge learning experience, blending theory with hands-on skills. At Byte Minds, we believe in the power of exploration and experimentation. Join us on a journey of discovery in the dynamic world of computer science, where creativity meets functionality, and problem-solving becomes second nature. Our dedicated faculty, comprising industry experts and seasoned educators, is here to guide and inspire you at every step.</p>
  </div>
</div>
</section>

<br><br>

<div class="container3">Follow Us For More
<br><br>
	<div class="social-icons">
  <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
  <a href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i></a>
  <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
	</div>
</div>
<br>

<section id="section3">
<div class="shadowc">
	<img src="1.png" class="centered-image">
	<div class="overlay-text"><i>Where code meets creativity, and algorithms paint the canvas of innovation...</i>
	</div>
</div>
</section>

<br>
<section id="section4">
	<div style="margin-left:120px">
		<div class="container2">
			<div class="box2"><br>			
				<h1 style="text-align:left"><u>Contact Us</u></h1>
					<p style="text-align:justify; font-size:18px;">
Hadath Branch:<br>
BMU Campus, Hadath, Building 5<br>
bmu.hadath@gmail.com<br>
01 250 100<br>
				<br>
Akkar Branch:<br>
BMU Campus, Akkar, Building 2<br>
bmu.akkar@gmail.com<br>
06 250 100<br>
				<br>
Koura Branch:<br>
BMU Campus, Koura, Building 4<br>
bmu.koura@gmail.com<br>
06 250 251<br>
					</p>
			</div>

<div class="box2" > 
  <br><br><br>
  <img src="contact.jpg" class="image-3d" style="margin-left:30px">
</div>
</div>
</div>
</section>
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
</body>
</html>
