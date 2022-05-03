<?php //login
require_once 'conexao.php';
if(isset($_SESSION['login_id'])){
    header('Location:dashboard.php');
    exit;
}
require 'google-api/vendor/autoload.php';
$client=new Google_Cliente();
$client->setClientId('923129810356-4m6burvf0iql988s4bi86tsrsriuv3k9.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUrl('https://localhost/oficina/');
$client->addScope('email');
$client->addScope('profile');

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
    <h1>Oficina dos doces</h1>
    <div id="container">
        <div class="shadow p-3 mb-5 bg-white rounded col-6 mx-auto">
        <h3> Acesso restrito</h3>
    <form action="acesso.php" method="post">
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="insira o email" name="email">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Senha:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Insira a senha" name="senha">
  </div>
  <div class="form-check mb-3">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" name="remember"> Lembre-me
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</body>
</html>
