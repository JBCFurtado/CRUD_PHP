<?php
session_start();
?>
<!doctype html>
<html lang="pt-br">
  <head>  

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Cairo|Exo&display=swap" rel="stylesheet">
    <style>
      p{color: white;}
      body { background-image: url("img/background2.jpg");background-color: #cccccc;background-attachment: fixed;;
      background-size:cover;
      background-repeat:no-repeat;}
      img{display: block; margin-left: auto; margin-right: auto;}
      h1{text-align: center;font-family: 'Cairo', sans-serif;color: darkgray;}
      h6{font-family: 'Exo', sans-serif;color:seashell;text-align: center;}
    </style>
    <style>
      .plano01, .plano02, .blue {
    color: #fff;
    display: block;
    line-height: 200px;
    /*
    position: absolute;
    text-align: center;
    width: 1300px;
    height: 30px;
    */
}

.plano01 {
  background-image: url("img/vd.jpg");
    background-attachment: fixed;
    background-size: cover;
    background-repeat: repeat-x;
    left: 0px;
    top: 0px;
    z-index: 0;
    /*
    opacity:0.5;
    */
}

.plano02 {
  background-image: url("img/background2.jpg");
    background-attachment: scroll;
    background-size: 1300px 260px;
    background-repeat: repeat-x;
    left: 0px;
    top: 0px;
    z-index: 1;
    opacity:0.6;
    
}

.blue {
    background: blue;
    left: 100px;
    top: 100px;
    z-index: 2;
  opacity:0.7;
}
.search-box{
  top: 0%;
  left: 0%
  transform: translate(-50%,-50%);
  background: #28a4a0;
  height: 35px;
  border-radius: 40px;
}
.search-btn{
  color: #e84118;
  float: right;
  width: 40px;
  height: 40;
  border-radius: 50%;
  background: #2f3640;
  display: flex;
}

body {
  color: #777;
}
    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Cadastro de Livraria</title>
  </head>
  <body>
    <div>
        <div>
            <span class="plano01"><img src="img/logo.png"/>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Menu</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#">Home<span class="sr-only">(Página atual)</span></a>
      <a class="nav-item nav-link" href="cadastrolivros.php">Cadastrar livros</a>
      <a class="nav-item nav-link" href="pesquisalivros.php">Buscar livros</a>
      <a class="nav-item nav-link" href="cadastrolivraria.php">Cadastrar Livraria</a>
      <a class="nav-item nav-link" href="pesquisalivraria.php">Buscar Livraria</a>
    </div>
  </div>
</nav>
        <div>
          <span class="plano02">
              <div class="container mt-2 mb-4 p-2 shadow bg-black">
                  <h6>Sistema de cadastro de livraria</h6>
              </span>
              </div>
        </div>
        <div class="container mt-2 mb-4 p-2 shadow bg-black">
          <form action="CRUDquery1.php" method="POST">
            <div class="form-row justify-content-center">
              <div class="col-auto">
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome da livraria">
              </div>
              <div class="col-auto">
                <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço">
              </div>
              <div class="col-auto">
                  <input type="number" name="cnpj" class="form-control" id="cnpj" placeholder="CNPJ">
              </div>
              <div class="col-auto">
                  <input type="text" name="telefone" class="form-control" id="telefone" placeholder="Telefone">
              </div>
              <div class="col-auto"> 
                <button type="reset" name="reset" class="btn btn-info">Limpar</button>
                <button type="submit" name="save" class="btn btn-info">Cadastrar</button> 
              </div>
              </div>
            </div>
          </form>
          <?php require_once("CRUDquery1.php"); ?>
          <div class="container">
            <?php if(isset($_SESSION['msg'])): ?>
             <div class="<?= $_SESSION['alert']; ?>">
                <?= $_SESSION['msg']; 
                unset($_SESSION['msg']);?>
             </div>
            <?php endif; ?>
            <div class="container mt-2 mb-4 p-2 shadow bg-white">
                <table class="table">
                    <thead>
                      <tr>
                        <th>CNPJ</th>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Telefone</th>
                        <th>Data Registro</th>
                        <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                      <form action="CRUDquery1.php" method="post">
                      <?php 
                      $sQuery = "SELECT * FROM cad_livraria LIMIT 20";
                      $result = $conn->query($sQuery);

                      $x = 1;
                      
                      while($row = $result->fetch_assoc()): ?>
                      
                      <tr>
                          <td><?= $row['cnpj']; ?></td>
                          <td><?= $row['nome']; ?></td>
                          <td><?= $row['endereco']; ?></td>
                          <td><?= $row['telefone']; ?></td>
                          <td><?= $row['created']; ?></td>
                          <td>
                            <button type="submit" name="delete" value="<?= $row['cnpj']; ?>" class="btn btn-danger">Deletar</button>
                            <button type="button" name="edit" value="<?= $x; $x++;?>" class="btn btn-primary">Editar</button>
                          </td>
                      </tr>
                    <?php endwhile; ?>
                    </tbody>
      
                  </table>
            </div>
          </div>
            <div class="container mt-2 mb-4 p-2 shadow bg-black">
              <p>
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
              </p>
              <p>
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
              </p>
              <p>
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
              </p>
                <h6>DESENVOLVEDORES - JARDEL CASTRO | JOBS TI</h6>
            </span>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
      $(document).ready(function(){
        setTimeout(function(){
          $(".alert").remove();
        }, 3000);

        $(".btn-primary").click(function() {
          $(".table").find('tr').eq(this.value).each(function(){
            $("#nome").val($(this).find('td').eq(1).text());
            $("#endereco").val($(this).find('td').eq(2).text());
            $("#cnpj").val($(this).find('td').eq(0).text());
            $("#telefone").val($(this).find('td').eq(3).text());
            $(".btn-info").val($(this).find('td').eq(0).text());
          });
          $(".btn-info").attr("name", "edit");
        });
      })
    </script>
  </body>
</html>
