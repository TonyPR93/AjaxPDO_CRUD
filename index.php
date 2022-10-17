<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CRUD en AJAX avec PDO</title>
		<link rel="stylesheet" href="./view/css.css">
	</head>
	<body>
		<div id="container">
			<h1>CRUD AJAX/PDO</h1>
			<button id="addnew">Ajouter</button>
			<div id="alert_content">
				<div id="alert">
					<span id="alert_message"></span>
					<button id="close_message">&times;</button>
				</div>  
			</div>
			
			<table id="table_content">
				<thead>
					<th>ID</th>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Adresse</th>
					<th>Action</th>
				</thead>
				<tbody id="tbody"></tbody>
			</table>
		</div>

		<!-- Page des opérations choisies -->
		<?php require_once('./view/operation.html'); ?>

		<!--Lib-->
		<script src="./lib/jquery.min.js"></script>
		<script src="view/js/app.js"></script>
	</body>
</html>