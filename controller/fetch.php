<?php
	include_once('../model/connection.php');

	$database = new Connection();
	$db = $database->open();

	try{	
	    $sql = 'SELECT * FROM members';
	    foreach ($db->query($sql) as $row) {
	    	?>
	    	<tr>
	    		<td><?php echo $row['id']; ?></td>
	    		<td><?php echo $row['firstname']; ?></td>
	    		<td><?php echo $row['lastname']; ?></td>
	    		<td><?php echo $row['address']; ?></td>
	    		<td>
	    			<button class="edit" data-id="<?php echo $row['id']; ?>">Editer</button>
	    			<button class="delete" data-id="<?php echo $row['id']; ?>">Supprimer</button>
	    		</td>
	    	</tr>
	    	<?php 
	    }
	}
	catch(PDOException $e){
		echo "Problème lors de la connexion de la bdd " . $e->getMessage();
	}

	$database->close();
	
?>