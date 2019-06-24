<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_STRING);
$isbn = filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_NUMBER_INT);
$editora = filter_input(INPUT_POST, 'editora', FILTER_SANITIZE_STRING);

$result_livros = "INSERT INTO cad_livros (isbn, nome, autor, editora, created) VALUES ('$isbn','$nome', '$autor','$editora', NOW())";
$resultado_livros = mysqli_query($conn, $result_livros);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Cadastro realizado com sucesso.</p>";
	header("Location: cad_livros.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>ERRO ao castrar usuário!</p>";
	header("Location: cad_livros.php");
}