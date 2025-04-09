<?php

require_once ("database.php");


function autentica($login, $pwd)
{
	
        $queryaut = "select * from supermercado where contato='$login' and senha = '$pwd'";
		$conaut = db_open_trans();							

		$rsaut = mysqli_query($conaut, $queryaut);
		
		if (mysqli_num_rows($rsaut) !=0) 
        {
        	$row = mysqli_fetch_array($rsaut);	
        }
        else
        {
			return false;
        }
	
	$apelido = explode(" ",$row['contato']);
	
	$var = array();
	
	$var["ID"] = $row['ID'];
	$var["nomecontato"] = $row['contato'];		
    $var["razaocontato"] = $row['razao'];		
	$var["apelidocontato"] = $apelido[0];
	
	$_SESSION[SISTEMA_CODIGO] = $var;
	
    return true;
	
}


function getErroS($msg){
	//Exibe mensagem de erro passado pelas telas de manutenção
		echo "<script>alert('$msg'); </script>";
}


function Redirect($url) {
	Header("Location:$url");
}


function insertContt($razao, $contato, $telefone, $email, $senha, $endereco, $telefonesuper)
{
	if (empty($razao) or empty($contato))
	{
		return false;
	} 
	
	//$ipaddr = $_SERVER["REMOTE_ADDR"];
	 //$sistema = SISTEMA_CODIGO;
	 $query = "insert into supermercado (razao, contato, telefone, email, senha, endereco, telefonesuper) values('$razao', '$contato', '$telefone', '$email', '$senha', '$endereco', '$telefonesuper')";
	 $conlog = db_open(); //duda
	 if (mysqli_query($conlog, $query)) {
     	return true;
	 } else {
      	echo "Error: ". mysqli_error($conlog);
	 }
}

function insertPro($produto, $classe, $quantidade, $valor, $imagem, $supermercado, $datainYMD, $dataatYMD)
{
	if (empty($produto) or empty($datainYMD))
	{
		return false;
	} 
	
	//$ipaddr = $_SERVER["REMOTE_ADDR"];
	 //$sistema = SISTEMA_CODIGO;
	 $query = "insert into preco (produto, classe, quantidade, valor, imagem, supermercado, datain, dataat) values('$produto', '$classe', '$quantidade', '$valor', '$imagem', '$supermercado', '$datainYMD', '$dataatYMD')";
	 $conlog = db_open(); //duda
	 if (mysqli_query($conlog, $query)) {
     	return true;
	 } else {
      	echo "Error: ". mysqli_error($conlog);
	 }
}


session_start();

?>