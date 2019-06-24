<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<style>
			img{display: block; margin-left: auto; margin-right: auto;}
			h1{text-align: center;}
			form{text-align: center;}
		</style>
		<meta charset="utf-8">
	
		<title>Jobs_TI - Cadastros</title>	

	</head>
	<img align="center"src="img/logo.png"/>
	<body>
	
		<h1>CADASTRE AQUI</h1>
		<div class="container">
		<form method="POST" action="CRUDquery.php">

<label>ISBN: </label>
<input type="numb" name="isbn" placeholder="Código isbn"><br><br>

<label>Nome: </label>
<input type="text" name="nome" placeholder="Digite seu nome completo"><br><br>

<label>Autor: </label>
<input type="text" name="autor" placeholder="Autor"><br><br>

<label>Editora: </label>
<input type="text" name="editora" placeholder="Editora"><br><br>

<input type="submit" name="save" value="save">
</form>
        </div>
		
		
	</body>
</html>