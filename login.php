<?php

require 'blog.php';
use Blog\DB;

view('login');

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if ( !empty($email) || !empty($password) ) {
		$row = Blog\DB\query("SELECT * FROM users WHERE username = '$_POST[username]' AND password = '$_POST[password]'",array('email' => $email, 'password' => $password),$conn);
		if($row) {
			
		    session_start();
			$_SESSION['username'] = $_POST['username']; 
		     view('home');
						
		} else {
			header("Location:  /ideasboard/signup.php");
		}
	} 
	
}




