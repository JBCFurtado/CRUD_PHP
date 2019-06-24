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
	
		<title>Cadastro de Livros</title>	

	</head>
	<img align="center"src="img/logo.png"/>
	<body>
	
		<h1>CADASTRO DO LIVRO</h1>
		<form method="POST" action="processa_livros.php">
			<p>Nome do Livro:<input type="text" name="nome" placeholder="Digite o nome do livro">&nbsp;&nbsp;
            Autor:<input type="text" name="autor" placeholder="Digite o nome do autor">&nbsp;&nbsp;
			ISBN:<input type="number" name="isbn" placeholder="Digite o código ISBN">&nbsp;&nbsp;
			Editora:<input type="text" name="editora" placeholder="Digite o nome da editora"></p>
			<p><input type="submit" value="Cadastrar"></p>
		</form>
	</body>
</html>