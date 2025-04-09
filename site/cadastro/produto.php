<?php

require_once("../inc/security.php");

$ID = $_POST["ID"];
$produto = $_POST["produto"];
$classe = $_POST["classe"];
$quantidade = $_POST["quantidade"];
$valor = $_POST["valor"];
$imagem = $_POST["imagem"];
$supermercado = $_POST["supermercado"];
$datain = $_POST["datain"];
$datainYMD = date("Y-m-d",strtotime(str_replace('/','-',$datain)));
$dataat = $_POST["dataat"];
$dataatYMD = date("Y-m-d",strtotime(str_replace('/','-',$dataat)));
	

		if(insertPro($produto, $classe, $quantidade, $valor, $imagem, $supermercado, $datainYMD, $dataatYMD)) 
		{
            echo "<font color='red'>Produto inserido com sucesso!</font>";
            Redirect("index.php");	
		}
		else 
		{
			
		}

?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<title>Cadastro de Produtos</title>
</head>
<body>
<div class="container text-center">
				<img src="../img/epoupe.jpg" widht="150px" height="150px"/>
				<blockquote class="blockquote">
  					<p class="h2">Cadastro de Produtos</p>
				</blockquote>
					<br>
</div>
	
	<table class="table table-bordered" style="width: 25% !important; border: 5px solid #ddd !important;" align="center">
		<tr><td>
<form action="index.php" id="ind" method="post">
			<div class="form-row justify-content-center" >
                <div class="form-group col-md-12">
                    <b>Produto</b>
                    &nbsp;&nbsp;<input type="text" class="form-control" name="produto" value="">
                </div>
			</div>
			<div class="form-row justify-content-center" >
                <div class="form-group col-md-12">
                    <b>Classe</b>
                    &nbsp;&nbsp;<select class="form-control" id="classe" name='classe'>
      							<option></option>
      							<option>Limpeza</option>
      							<option>Perecíveis</option>
      							<option>Saúde</option>
    							</select>
                </div>
			</div>
			<div class="form-row justify-content-center" >
		        <div class="form-group col-md-6">
                    <b>Quantidade</b>
                    &nbsp;&nbsp;<input type="text" class="form-control" name="quantidade" value="">
                </div>
                <div class="form-group col-md-6">
                    <b>Valor</b>
                    &nbsp;&nbsp;<input type="text" class="form-control" name="valor" value="">
                </div>
			</div>
			<div class="form-row justify-content-center" >
                <div class="form-group col-md-12">
                    <b>Imagem</b>
                    &nbsp;&nbsp;<input type="file" class="form-control-file" id="imagem" name='imagem'>
                </div>
			</div>
			<div class="form-row justify-content-center" >
		        <div class="form-group col-md-12">
                    <b>Supermercado</b>
                    &nbsp;&nbsp;<input type="text" class="form-control" name="supermercado" value="">
                </div>
			</div>
			<div class="form-row justify-content-center" >
                 <div class="form-group col-md-6">
                    <b>Data Atual</b>
                    &nbsp;&nbsp;<input type="text" class="form-control" name="datain" value="">
                </div>

                <div class="form-group col-md-6">
                    <b>Data Final</b>
                    &nbsp;&nbsp;<input type="text" class="form-control" name="dataat" value="">
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
