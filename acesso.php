<?php
  require_once "conexao.php";
  require_once "Produto.class.php";
  require 'db_connection.php';

  if(!isset($_SESSION['login_id'])){
      header('Location: index.php');
      exit;
  }

  $id = $_SESSION['login_id'];

  $get_user = $conn->prepare($db_connection, "SELECT * FROM `users` WHERE `google_id`='$id'");
   $get_user->execute();
  while($row> 0){
      $user = mysqli_fetch_assoc($get_user);
  } else {
      header('Location: logout.php');
      exit;
  }
  
?>
<html>
  <head>
    <title>Oficina dos Doces</title> 
    <meta charset="UTF-8">  
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>   
  </head>
  <body>
    <h1>Oficina dos Doces</h1>
    <table class="table table-hover">
    <thead>
      <tr>
        <th>Codigo</th> <th>Nome</th>
        <th>Preço</th>  <th>Ações</th>
      </tr>
    </thead>
    <tbody>
<?php
//inicio do looping
$stmt = $conn->prepare("SELECT codigo, nome, preco FROM produto");
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_OBJ)){
?>
      <tr>
        <td><?php echo $row->codigo;  ?></td>
        <td><?php echo $row->nome;  ?></td>
        <td><?php echo $row->preco;  ?></td>
        <td>
        <a href="add.php?codigo=<?php echo $row->codigo; ?>" class="btn btn-outline-success" role="button" aria-pressed="true">Editar</a>

        <a href="del.php?codigo=<?php echo $row->codigo; ?>" class="btn btn-outline-danger" role="button" aria-pressed="true">Excluir</a>
      </tr>
<?php  } //fim do looping  ?>
    </tbody>
  </table>
  <a href="add.php" class="btn btn-outline-primary" role="button" aria-pressed="true">Adicionar</a>
  </body>
</html>