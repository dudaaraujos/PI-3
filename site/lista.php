<!doctype html>
<?php

require_once ("inc/database.php");

$Search = $_POST['txtSearch'];

 	//seta a quantidade de itens por página, neste caso, 2 itens 
 	$registros = 10;
	
	//verifica a página atual caso seja informada na URL, senão atribui como 1ª página 
	$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 
	
	//variavel para calcular o início da visualização com base na página atual 
	$inicio = ($registros*$pagina)-$registros;

if (empty($_POST['txtSearch']))
{
	$sql="select ID, produto, classe, quantidade, valor, imagem, supermercado, datain, dataat FROM preco";
	$sqlpg="select ID, produto, classe, quantidade, valor, imagem, supermercado, datain, dataat FROM preco Order by valor DESC LIMIT $registros OFFSET $inicio";
	
	// mostra na página com LIMIT e OFFSET
	$produtospg = mysqli_query($conn,$sqlpg);	
	
	// arrumar o LIMIT 
	$produtos = mysqli_query($conn,$sql);
	$total = mysqli_num_rows($produtos);
	
	//calcula o número de páginas arredondando o resultado para cima 
	$numPaginas = ceil($total/$registros);	
}
else
{
	$sql="select ID, produto, classe, quantidade, valor, imagem, supermercado, datain, dataat FROM preco WHERE produto like '%$Search%' Order by valor DESC";// LIMIT $registros OFFSET $inicio";
	
		// arrumar o LIMIT 
	$produtospg = mysqli_query($conn,$sql);
	$total = mysqli_num_rows($produtospg);
	
	//calcula o número de páginas arredondando o resultado para cima 
	$numPaginas = ceil($total/$registros);
}

?>
<html>
<head>
<meta charset="utf-8">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<link rel="alternate stylesheet" href="css/escuro.css" title="2">
<link rel="alternate stylesheet" href="css/claro.css" title="1">

<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<script type="text/javascript" src="js/alterar.js"></script>
<style>
	.target { 
		display: none;
		position: relative;
  		top: -350px;
	}
</style>
<title>Lista</title>
</head>

<body>
	  <div vw class="enabled">
		  <div><button type="button" class="btn btn-primary" id="click">Contraste</button></div><br>
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
	<div align="center">
		<img src="../img/epoupe.jpg" widht="150px" height="150px"/>
	</div>
	<table style="width: 70% !important;" align="center">
		<tr align="right">
			<td>
				<form action="lista.php" id="lista" name="lista" method="post">
				<div class="row">
    			<div class="col-xs-6 col-md-4">
      				<div class="input-group">
        				<input type="text" class="form-control" placeholder="Pesquisar Produto" id="txtSearch" name="txtSearch"/>
        					<div class="input-group-btn">
          						<button class="btn btn-primary" type="submit">
            						<span class="glyphicon glyphicon-search"></span>
          						</button>
        					</div>
      				</div>
    			</div>
  			</div>
				</form>
			
			</td>
		</tr>
	</table>
	<table class="table table-bordered" style="width: 70% !important; border: 5px solid #ddd !important;" align="center" name="tableprod" id="tableprod">
	<tr>
                <th>Imagem</th>
                <th>Produto</th>
                <th>Classe</th>
                <th>Unidade</th>
                <th>Valor</th>
                <th>Supermercado</th>
				<th>Cadastro</th>
                <th>Atualiza em</th>
    </tr>
	<?php
				while ($mostra = mysqli_fetch_assoc($produtospg)){
						$id = $mostra['ID'];
						$prod = $mostra['produto'];
						$cl = $mostra['classe'];
						$qt = $mostra['quantidade'];
						$vl = $mostra['valor'];
						$img = $mostra['imagem'];
						$super = $mostra['supermercado'];
						$dti = $mostra['datain'];
						$dtiYMD = date("d/m/Y",strtotime(str_replace('-','/',$dti)));
						$dta = $mostra['dataat'];
						$dtaYMD = date("d/m/Y",strtotime(str_replace('-','/',$dta)));
                	echo "
                	<tr>
					<td><img src=".$img." height='50px' width='50px'/></td>
                	<td>".$prod."</td>
                	<td>".$cl."</td>
                	<td>".$qt."</td>
                	<td><font color='red'><b>".$vl."</b></font></td>
                	<td>".$super."</td>
					<td>".$dtiYMD."</td>
                	<td>".$dtaYMD."</td>
					</tr>";
				}
				echo "<table>";
		echo "<div class='col-xs-12'><div class='text-center'><ul class='pagination pagination-large'>";
    	for($i = 1; $i < $numPaginas + 1; $i++) { 
        echo "<li><a href='lista.php?pagina=$i'>".$i."</a></li> "; 
    	} 
		echo"</ul></div></div>";
		
	if (empty($numPaginas)){
		echo "<table class='table table-bordered' style='width: 10% !important; border: 5px solid #ddd !important;' align='center'><tr><td>Aponte a câmera do celular e Whatsapp-me!<br>";
		echo "<img src='../img/qrcode-5511940811048.jpg' widht='150px' height='150px'/><br>";
		echo "E solicite a inclusão do Produto pesquisado!<br>";
		echo "Você pesquisou: <font color= 'red'>".$Search."</font></td></tr></table>";
	}

?>
		</td></tr>
	</table>
    <br />
<div>
	<div class="float-right !important" align="center">
      <input type="button" class="btn btn-warning" name="sair" value="Sair" onClick="myFunction()"/> | <input type="button" class="btn btn-warning" name="toggle-button" id="toggle-button" value="Contato"/>
	</div>
			<br> <br>
	<div class="target">
		<table class="table table-bordered" style="width: 10% !important; border: 5px solid #ddd !important; background-color: white" align="center">
			<tr>
				<td>Aponte a câmera do celular e Whatsapp-me!<br>
					<img src='../img/qrcode-5511940811048.jpg' widht='150px' height='150px'/><br>
					Ou, se preferir...<br>
					contato@epoupe.com.br
		<script type="text/javascript">
            document.getElementById('toggle-button').addEventListener('click', function () {
    toggle(document.querySelectorAll('.target'));
});

function toggle (elements, specifiedDisplay) {
  var element, index;

  elements = elements.length ? elements : [elements];
  for (index = 0; index < elements.length; index++) {
    element = elements[index];

    if (isElementHidden(element)) {
      element.style.display = '';

      // If the element is still hidden after removing the inline display
      if (isElementHidden(element)) {
        element.style.display = specifiedDisplay || 'block';
      }
    } else {
      element.style.display = 'none';
    }
  }
  function isElementHidden (element) {
    return window.getComputedStyle(element, null).getPropertyValue('display') === 'none';
  }
}
        </script>
	</div>
<script>
function myFunction() {
  location.href="<?php echo URL_BASE_SISTEMA;?>index.php";
}
</script>
</div>
</body>
</html>