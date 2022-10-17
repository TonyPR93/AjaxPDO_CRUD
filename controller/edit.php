<?php
	include_once('../model/connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try{
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];

		$sql = "UPDATE members SET firstname = '$firstname', lastname = '$lastname', address = '$address' WHERE id = '$id'";

		if($db->exec($sql)){
			$output['message'] = "L'élément a été édité avec succes";
		} 
		else{
			$output['error'] = true;
			$output['message'] = "Erreur. Impossible d'éditer l'élément";
		}

	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();
	}


	$database->close();

	echo json_encode($output);
	
?>