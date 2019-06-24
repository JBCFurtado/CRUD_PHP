<?php
//fetch.php
if(isset($_POST["query"]))
{
 $connect = mysqli_connect("localhost", "root", "", "bd_jobs");
 $request = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM cad_livros
  WHERE nome LIKE '%".$request."%' 
  OR autor LIKE '%".$request."%' 
  OR editora LIKE '%".$request."%' 
  OR isbn LIKE '%".$request."%'
 ";
 $result = mysqli_query($connect, $query);
 $data =array();
 $html = '';
 $html .= '
  <table class="table table-bordered table-striped">
   <tr>
    <th>Nome do Livro</th>
    <th>Autor</th>
    <th>Editora</th>
    <th>ISBN</th>
   </tr>
  ';
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $data[] = $row["nome"];
   $data[] = $row["autor"];
   $data[] = $row["editora"];
   $data[] = $row["isbn"];
   $html .= '
   <tr>
    <td>'.$row["nome"].'</td>
    <td>'.$row["autor"].'</td>
    <td>'.$row["editora"].'</td>
    <td>'.$row["isbn"].'</td>
   </tr>
   ';
  }
 }
 else
 {
  $data = 'No Data Found';
  $html .= '
   <tr>
    <td colspan="3">No Data Found</td>
   </tr>
   ';
 }
 $html .= '</table>';
 if(isset($_POST['typehead_search']))
 {
  echo $html;
 }
 else
 {
  $data = array_unique($data);
  echo json_encode($data);
 }
}

?>
