<?php

require_once("../inc/security.php");

$ID = $_POST["ID"];
$razao = $_POST["razao"];
$contato = $_POST["contato"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$endereco = $_POST["endereco"];
$telefonesuper = $_POST["telefonesuper"];
	

		if(insertContt($razao, $contato, $telefone, $email, $senha, $endereco, $telefonesuper)) 
		{
            echo "<font color='red'>Contato inserido com sucesso!</font>";
            Redirect("../login.php");	
		}
		else 
		{
			
		}

?>
<html>
<head>
<meta charset="utf-8">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style>
.form-group .glyphicon-eye-open {
  pointer-events: auto;
}
.form-group .glyphicon-eye-open:hover {
  cursor: pointer;
}
</style>
<title>Cadastro de Contato</title>
</head>
<body>
<div class="container text-center">
				<img src="../img/epoupe.jpg" widht="150px" height="150px"/>
				<blockquote class="blockquote">
  					<p class="h2">Cadastro de Contato</p>
				</blockquote>
					<br>
</div>
	
	<table class="table table-bordered" style="width: 25% !important; border: 5px solid #ddd !important;" align="center">
		<tr><td>
<form action="index.php" id="ind" method="post">
			<div class="form-row justify-content-center" >
                <div class="form-group col-md-12">
                    <b>Razão Social</b>
                    &nbsp;&nbsp;<input type="text" class="form-control" name="razao" value="">
                </div>
			</div>
			<div class="form-row justify-content-center" >
                <div class="form-group col-md-12">
                    <b>Contato</b>
                    &nbsp;&nbsp;<input type="text" class="form-control" name="contato" value="">
                </div>
			</div>
			<div class="form-row justify-content-left" >
		        <div class="form-group col-md-6">
                    <b>Telefone</b>
                    &nbsp;&nbsp;<input type="text" class="form-control" name="telefone" value="">
                </div>
			</div>
			<div class="form-row justify-content-center" >
                <div class="form-group col-md-12">
                    <b>E-mail</b>
                    &nbsp;&nbsp;<input type="text" class="form-control" name="email" value="">
                </div>
			</div>
			<div class="form-row justify-content-left" >
                <div class="form-group col-md-6">
                    <b>Senha</b>
                    &nbsp;&nbsp;<input type="password" class="form-control" id="senha" name='senha' value="">
					<span id="spnMostrarSenha" class="glyphicon glyphicon-eye-open form-control-feedback"></span>
<script type="text/javascript">
var $spnMostrarSenha = $('#spnMostrarSenha');
var $txtSenha = $('#senha');

$spnMostrarSenha
  .on('mousedown mouseup', function() {
    var inputType = $txtSenha.attr('type') == 'password' ? 'text' : 'password';
    $txtSenha.attr('type', inputType);
  })
  .on('mouseout', function() {
    $txtSenha.attr('type', 'password');
  });
</script>
                </div>
			</div>
			<div class="form-row justify-content-center" >
		        <div class="form-group col-md-12">
                    <b>Endereço</b>
                    &nbsp;&nbsp;<input type="text" class="form-control" name="endereco" value="">
                </div>
			</div>
			<div class="form-row justify-content-left" >
                 <div class="form-group col-md-6">
                    <b>Telefone do Supermercado</b>
                    &nbsp;&nbsp;<input type="text" class="form-control" name="telefonesuper" value="">
                </div>
			</div>
			<div class="form-row" >
		        <div class="form-group col-md-12">
                </div>               
			</div>
			<div class="form-row" >
				<div class="form-group col-md-4">
        		</div>
			</div>
			<div class="form-row justify-content-center" >
				<div class="form-group col-md-12">
                    <br>
                    <input type="submit" value="Inserir" class="btn btn-warning" name="inserir" />
				</div>
			</div>
</form>
			</td></tr>
</table>
<div align="center">
	<input type="reset" value="Cancelar" class="btn btn-warning" name="Cancelar" onClick="menu()"/>
</div>
	
<script type="text/javascript">

function menu() {
	window.open("<?php echo URL_BASE_SISTEMA;?>cadastro/logout.php", "_self");
}
</script>
		</div>
	<br><br>
	</body>
</html>
