<?php

$conn = new mysqli("localhost","root","","bd_jobs" ) OR die("ERRO: " . mysqli_error($conn));


//code to save urserś da
if (isset($_POST['save'])){
    if(!empty($_POST['nome']) && !empty($_POST['autor']) && !empty($_POST['isbn']) && !empty($_POST['editora'])){
        
        $isbn = $_POST['isbn'];
        $nome = $_POST['nome'];
        $autor = $_POST['autor'];
        $editora=$_POST['editora'];
        

        $iQuery = "INSERT INTO cad_livros(isbn,nome,autor,editora,created) VALUES (?,?,?,?,NOW())";

        $stmt =$conn->prepare($iQuery);
        $stmt->bind_param("isss",$isbn ,$nome,$autor,$editora);
        if ($stmt->execute()){
            # alert msg
            $_SESSION['msg'] = "Cadastrado com sucesso";
            $_SESSION['alert'] ="alert alert-sucess";
        }
        $stmt->close();
        $conn->close();
    }
    else {
             $_SESSION['msg'] = "Atualizado f";
             $_SESSION['alert'] ="alert alert-warning";
    }
    header("location: cadastrolivros.php"); 
}
#Delete selected data
if (isset($_POST['delete'])){
    $isbn = $_POST['delete'];

    $dQuery = "DELETE FROM cad_livros WHERE isbn = ?";
    $stmt = $conn->prepare($dQuery);
    $stmt->bind_param('i', $isbn);
    if($stmt->execute()){
        $_SESSION['msg'] = "Selected record is successfully deleted.";
        $_SESSION['alert'] = "alert alert-danger";
    }
    $stmt->close();
    $conn->close();
    header("location: cadastrolivros.php");
}
#update users
if (isset($_POST['edit'])){
    if(!empty($_POST['nome']) && !empty($_POST['autor']) && !empty($_POST['isbn']) && !empty($_POST['editora'])){
        #code....
       
        $nome = $_POST['nome'];
        $autor = $_POST['autor'];
        $editora = $_POST['editora'];
        $isbn = $_POST['edit'];

        $uQuery = "UPDATE cad_livros SET nome = ?, autor = ?, editora = ? WHERE isbn = ?";

        $stmt = $conn->prepare($uQuery);
        $stmt->bind_param('sssi', $nome, $autor, $editora, $isbn);

        if($stmt->execute()){
            $_SESSION['msg'] = "Select record is successfully update.";
            $_SESSION['alert'] = "alert alert-success";
        }
        $stmt->close();
        $conn->close();
    }
    else {
        $_SESSION['msg'] = "Atualizado f";
        $_SESSION['alert'] ="alert alert-warning";
    }
    header("location: cadastrolivros.php");
}
?>