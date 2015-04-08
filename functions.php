<?php

function view($path, $data = null) 
{
	if ( $data ) {
		extract($data);
	}

	$path .= '.view.php';

	if ($path == "home.view.php"){
		header('Location: /idbs/views/home.view.php');
	} else {
		include "views/layout.php";
	}

	
}


