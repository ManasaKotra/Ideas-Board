<?php

require 'blog.php';
use Blog\DB;

view('signup');

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	$email    = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$row = Blog\DB\query("SELECT * FROM users WHERE username = '$_POST[username]' AND password = '$_POST[password]'",
							array('email' => $email, 'password' => $password),
							$conn);
	if($row){
		// Already existing user
		header("Location:  /ideasboard/login.php");
	} else {
		Blog\DB\query("INSERT INTO users (email, username, password) VALUES (:email, :username, :password)",
						array('email' => $email,'username' => $username,'password' => $password),
						$conn);
		session_start();
		$_SESSION['username'] = $_POST['username']; 
	     view('home');
	   
	} 
	
} 
