<?php

require 'blog.php';
use Blog\DB;

$sessname = [];

if(!isset($_SESSION['username'])){
    header("Location:  /ideasboard/index.php");
} else {
	$sessname = $_SESSION['username'];
	view('home', $sessname);
}





