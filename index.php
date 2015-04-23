<?php

require 'blog.php';
use Blog\DB;


view('index');

if(isset($_SESSION['username'])){
    session_destroy();
}