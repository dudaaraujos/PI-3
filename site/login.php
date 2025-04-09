<?php

require_once("inc/security.php");

$login 		= $_POST["login"];
$password 	= $_POST["password"];
$msg 		= "";

?>
<html>
<head>
<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	-->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="https://www.google.com/recaptcha/enterprise.js?render=6LdTUw0rAAAAAIBnSHxTe9msBvYkRh-s6M4PPcS9"></script>
</head>
<boby>
        <div>
			<div align="center">
				<img src="../img/epoupe.jpg" widht="150px" height="150px"/>
			</div>
			<div align="center">
				<form action="login.php" method="post" id="formlogin" name="formlogin">
					<br>
				<blockquote class="blockquote text-center">
  					<p class="h2">Cadastro de Produtos</p>
  					<footer class="blockquote-footer"><cite title="Source Title">Preencha o nome do Contato e Senha para acessar.</cite></footer>
				</blockquote>
					<br>
				<div>
					<table class="table table-bordered" style="width: 15% !important; border: 5px solid #ddd !important;" align="center">
						<tr align="right">
							<td>
								<span><label for="login">Contato: </label> </span>
							</td>
							<td>
								<span><input type="text" name="login" maxlength="20"> </span>
							</td>
						</tr>
						<tr align="right">	
							<td>
								<span><label for="Senha">Senha: </label> </span>
							</td>
							<td>
								<span><input type="password" name="password" maxlength="100"> </span>	
							</td>							
						</tr>
						<tr align="right">
							<td colspan="2">
								<br>
								<button class="g-recaptcha btn btn-warning"
    								data-sitekey="6LdTUw0rAAAAAIBnSHxTe9msBvYkRh-s6M4PPcS9"
    								data-callback='onSubmit'
    								data-action='submit'>Entrar</button>
							</td>
						</tr>						
						<tr align="right">
							<td colspan="2">
								<?php
								// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
									if (!empty($_POST) AND (empty($_POST["login"]) OR empty($_POST["password"]))) {

    									echo $msg = "Preencha o Contato e Senha.";  
									}
									else{
										if(autentica($login, $password)) 
									{
    								// Se a sessão não existir, inicia uma
      								if (!isset($_SESSION)) session_start();

									Redirect("/cadastro/produto.php");	
									}	
									}
								
								?>
								<!-- <a class="class_cadastrese" href="../cadastro">Cadastre-se</a> | 
								<a class="class_senha" href="../reset">Esqueci a senha</a>-->
							</td>
						</tr>
					</table>
					<div>
<form>
	<div align="center">
      <input type="button" class="btn btn-warning" name="voltar" value="Voltar" onClick="myFunction()"/>
	</div>
</form>
<!-- Replace the variables below. -->
<script>
  function onSubmit(token) {
    document.getElementById("formlogin").submit();
  }
</script>						
<script>
function myFunction() {
  location.href="<?php echo URL_BASE_SISTEMA;?>index.php";
}
</script>
</div>
				</div>
				</form>
			</div>
		</div>
</body>
</html>
