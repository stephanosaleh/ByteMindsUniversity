<?php

include_once('classes.php');

session_start();
//session_destroy();

$user= new user();

if(!isset($_SESSION['user'])) 
$_SESSION['user']= $user ;
$user=$_SESSION['user'];


$student= new student();

if(!isset($_SESSION['student'])) 
$_SESSION['student']=$student;
$student=$_SESSION['student'];


$professor= new professor();

if(!isset($_SESSION['professor']))
$_SESSION['professor']=$professor;
$professor=$_SESSION['professor'];


$majors=new majors();

if(!isset($_SESSION['majors'])) 
$_SESSION['majors']=$majors;
$majors=$_SESSION['majors'];


$courses=new courses();

if(!isset($_SESSION['courses'])) 
$_SESSION['courses']=$courses;
$courses=$_SESSION['courses'];

if(!isset($_SESSION['branch1']))
$_SESSION['branch1']=$branch1;
$branch1=$_SESSION['branch1'];

if(!isset($_SESSION['branch2']))
$_SESSION['branch2']=$branch2;
$branch2=$_SESSION['branch2'];

if(!isset($_SESSION['branch3']))
$_SESSION['branch3']=$branch3;
$branch3=$_SESSION['branch3'];




?>