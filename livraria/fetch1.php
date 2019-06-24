<?php
//fetch.php
if(isset($_POST["query"]))
{
 $connect = mysqli_connect("localhost", "root", "", "bd_jobs");
 $request = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM cad_livraria
  WHERE nome LIKE '%".$request."%' 
  OR endereco LIKE '%".$request."%' 
  OR telefone LIKE '%".$request."%' 
  OR cnpj LIKE '%".$request."%'
 ";
 $result = mysqli_query($connect, $query);
 $data =array();
 $html = '';
 $html .= '
  <table class="table table-bordered table-striped">
   <tr>
    <th>Nome da Livraria</th>
    <th>Endereço</th>
    <th>Telefone</th>
    <th>CNPJ</th>
   </tr>
  ';
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $data[] = $row["nome"];
   $data[] = $row["endereco"];
   $data[] = $row["telefone"];
   $data[] = $row["cnpj"];
   $html .= '
   <tr>
    <td>'.$row["nome"].'</td>
    <td>'.$row["endereco"].'</td>
    <td>'.$row["telefone"].'</td>
    <td>'.$row["cnpj"].'</td>
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
