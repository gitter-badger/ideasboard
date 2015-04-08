<?php

require 'blog.php';
use Blog\DB;


if(!isset($_SESSION['username'])){
    header("Location:  /idbs/index.php");
}

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	$title = $_POST['title'];
	$body = $_POST['body'];

	if ( empty($title) || empty($body) ) {
		echo 'Please fill out both inputs.';
	} else {
		// then create a new row in the table
		Blog\DB\query(
			"INSERT INTO cards(title, body) VALUES(:title, :body)",
			array('title' => $title, 'body' => $body),
			$conn);
	}
}


?>