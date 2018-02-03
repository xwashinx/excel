<?php
  ob_start();
  error_reporting(E_WARNING);
  header("Content-Type: text/html;charset=utf-8");
  date_default_timezone_set('America/Fortaleza'); 

  require('conexion.php');

  if (isset($_POST['action']) && !empty($_POST['action'])) {
  
  	$action = addslashes($_POST['action']);

  	switch ($action) {
  		case 'alta':
			$rm = $_POST['rm'];
			$tc = $_POST['tc'];
			$mg = $_POST['mg'];
			$rx = $_POST['rx'];
			$ac = $_POST['ac'];
			$ur = $_POST['ur'];

			finalizo_

			$query = "INSERT INTO nomenclador (rm, tc, mg, rx, ac, ur, usuario) VALUES ('$rm', '$tc', '$mg', '$rx', '$ac', '$ur', '$usuario') ";


  			break;
  		
  		case 'edita':
			$rm = $_POST['rm'];
			$tc = $_POST['tc'];
			$mg = $_POST['mg'];
			$rx = $_POST['rx'];
			$ac = $_POST['ac'];
			$ur = $_POST['ur'];

			$query = "UPDATE nomenclador SET rm = '$rm', tc = '$tc', mg = '$mg', rx = '$rx', ac = '$ac', ur = '$ur', usuario = '$usuario'  WHERE id = '$id' LIMIT 1";

  			break;

  		case 'baja':
  			# code...
  			break;  			
  	}



  }








?>