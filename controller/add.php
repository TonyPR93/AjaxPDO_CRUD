<?php
	require_once('../model/connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try{
		//on prépare la query
		$stmt = $db->prepare("INSERT INTO members (firstname, lastname, address) VALUES (:firstname, :lastname, :address)");
		//si la requete est bonne on execute
		if ($stmt->execute(array(':firstname' => $_POST['firstname'] , ':lastname' => $_POST['lastname'] , ':address' => $_POST['address'])) ){
			$output['message'] = "L'élément a été ajouté avec succes";
		}
		else{
			$output['error'] = true;
			$output['message'] = "Erreur. Impossible d'ajouter l'élément";
		} 
		   
	}
	catch(PDOException $e){
		$output['error'] = true;
 		$output['message'] = $e->getMessage();
	}


	$database->close();

	echo json_encode($output);

?>