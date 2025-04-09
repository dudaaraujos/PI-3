<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<title>E-POUPE</title>
</head>

<body>
	<div align="center"><img src="img/epoupe.jpg" alt="" width="500" height="500"/></div>
 <div align="center">
    <a href="lista.php" target="_top" align="middle"><button class="btn btn-warning" name="Consumidor">Consumidor</button></a>
    <p></p>
    <a href="login.php" target="_top" align="middle"><button class="btn btn-warning" name="Comerciante">Comerciante</button></a>
    <p></p>
    <iframe width="280px" height="40px" frameBorder="0" src="https://www.epoupe.com.br/filemtime.php"></iframe>
   </div>
	  <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
</body>
</html>
