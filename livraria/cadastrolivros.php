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

    <title>Cadastro de Livros</title>
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
                  <h6>Sistema de cadastro de livros</h6>
              </span>
              </div>
        </div>
        <div class="container mt-2 mb-4 p-2 shadow bg-black">
          <form action="CRUDquery.php" method="POST"> para <form action="CRUDquery.php" method="POST">
            <div class="form-row justify-content-center">
              <div class="col-auto">
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome do livro">
              </div>
              <div class="col-auto">
                <input type="text" name="autor" class="form-control" id="autor" placeholder="Autor do livro">
              </div>
              <div class="col-auto">
                  <input type="number" name="isbn" class="form-control" id="isbn" placeholder="Código ISBN">
              </div>
              <div class="col-auto">
                  <input type="text" name="editora" class="form-control" id="editora" placeholder="Editora">
              </div>
              <div class="col-auto"> 
                <button type="reset" name="reset" class="btn btn-info">Limpar</button>
                <button type="submit" name="save" class="btn btn-info">Cadastrar</button> 
              </div>
              </div>
            </div>
          </form>
          <?php require_once("CRUDquery.php"); ?>
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
                        <th>ISBN</th>
                        <th>Nome</th>
                        <th>Autor</th>
                        <th>Editora</th>
                        <th>Data Registro</th>
                        <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                      <form action="CRUDquery.php" method="post">
                      <?php 
                      $sQuery = "SELECT * FROM cad_livros LIMIT 20";
                      $result = $conn->query($sQuery);

                      $x = 1;
                      
                      while($row = $result->fetch_assoc()): ?>
                      
                      <tr>
                          <td><?= $row['isbn']; ?></td>
                          <td><?= $row['nome']; ?></td>
                          <td><?= $row['autor']; ?></td>
                          <td><?= $row['editora']; ?></td>
                          <td><?= $row['created']; ?></td>
                          <td>
                            <button type="submit" name="delete" value="<?= $row['isbn']; ?>" class="btn btn-danger">Deletar</button>
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
                  A livraria mais antiga do mundo em atividade contínua no local atual: a Livraria Bertrand, situada desde 1773 na rua Garret 73/75 em Lisboa, Portugal.

                  A Livraria Bertrand foi fundada em 1732, na rua Direita do Loreto, por Pedro Faure. Em 1755 veio a ser destruída por um enorme terremoto e maremoto seguidos de um incêndio que assolaram Lisboa, tendo sido instalada em outro local. Dezoito anos depois, após a reconstrução da cidade, a Livraria Bertrand foi instalada no local onde ainda hoje existe, completando assim 238 anos de funcionamento continuado.
              </p>
              <p>
                  Desde então a Livraria Bertrand faz parte do património cultural da cidade. Por lá passaram gerações de escritores portugueses, como Alexandre Herculano, Oliveira Martins, Eça de Queirós, Antero de Quental e Ramalho Ortigão ou, mais recentemente, Fernando Namora e José Cardoso Pires.
              </p>
              <p>
                  A Livraria Bertrand não só comercializa livros e artigos relacionados, mas é também uma editora prestigiada. Apesar da livraria original se encontrar no Chiado, perto do local onde Fernando Pessoa nasceu e do café A Brasileira que Pessoa frequentou, a Bertrand expandiu-se tornando-se uma cadeia de atualmente com 53 lojas em Portugal.

                  A célebre livraria Galignani de Paris reivindica ser a mais antiga do mundo, por ter sido fundada em 1520, na cidade italiana de Veneza. Contudo, apenas foi instalada em 1856 na sua atual localização, rue de Rivoli 224, pelo que a sua congênere lisboeta possui uma história de laboração contínua no mesmo local de mais 83 anos.
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
            $("#autor").val($(this).find('td').eq(2).text());
            $("#isbn").val($(this).find('td').eq(0).text());
            $("#editora").val($(this).find('td').eq(3).text());
            $(".btn-info").val($(this).find('td').eq(0).text());
          });
          $(".btn-info").attr("name", "edit");
        });
      })
    </script>
  </body>
</html>
