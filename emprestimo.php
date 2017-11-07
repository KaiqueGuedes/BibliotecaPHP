<?php

	$id = trim($_GET['id']);
	$ra = trim($_GET['aluno']);
	$reserva = trim($_GET['reserva']);

	echo "Livro ID: $id <br>";
	echo "RA: $ra <br>";
	echo "Qtd. Reservada: $reserva <br>";

?>