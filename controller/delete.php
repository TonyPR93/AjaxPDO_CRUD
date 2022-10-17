<?php
	include_once('../model/connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try{
		$sql = "DELETE FROM members WHERE id = '".$_POST['id']."'";

		if($db->exec($sql)){
			$output['message'] = "L'élément à été supprimé avec succes";
		}
		else{
			$output['error'] = true;
			$output['message'] = "Erreur. Impossible d'effacer l'élément";
		} 
	}
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();
	}


	$database->close();

	echo json_encode($output);

?>