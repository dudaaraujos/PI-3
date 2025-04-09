<?php
// exibe algo como: arquivo.txt foi modificado em December 29 2002 22:16:23.

$filename = 'index.php';
if (file_exists($filename)) {
	setlocale(LC_ALL, 'pt_BR.utf8');
	echo strftime('Versão: %A, %d de %B de %Y', filemtime($filename));
}
?>