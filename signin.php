<?php
ob_start();
?>
<?php
include_once "menu-lateral.php"; ?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Crete+Round|Oswald|Roboto" rel="stylesheet">
	    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
	    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
	    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
        	<link href="assets/css/bootstrap.css" rel="stylesheet">
        	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        	<link rel="stylesheet" href="http://s.mlcdn.co/animate.css">
        	<link href="assets/css/style.css" rel="stylesheet">
        	<link href="assets/css/style-responsive.css" rel="stylesheet">
        	<link href="css/styles.css" rel="stylesheet">
  </head>
  <body>
    <?php
  	$_SESSION['usuario_valido']=false;
  	if(!empty($_POST['usuario']) AND !empty($_POST['clave'] )){
  		$sql="SELECT * FROM clientes where usuario='".$_POST['usuario']."' and clave='".$_POST['clave']."'";
  		$cliente=ConsultaSql($sql);
  		//echo $cliente;
  		$count = mysql_num_rows($cliente);

  		$cli=mysql_fetch_array($cliente);

  		if($count==1){
  			$_SESSION['usuario_valido']=TRUE;
  			$_SESSION['usuario']=$_POST['usuario'];
  			$_SESSION['id_usuario']=$cli['id'];
  			$_SESSION['rol']=$cli['rol'];
  			header('Location: index.php');
  		}else{ ?>
        <div id="navbar" class="navbar-collapse collapse" style="background-color: #0080FF;">
          <div class="alert">
              <span class="closebtn" onclick="this.parentElement.style.display='none';"><a href="signin.php">X</a></span>
              <strong><center>Usuario o Contraseña  incorrectos!</strong>
          </div>
      </div> <?php } } ?>
      <div class="container">
        <form class="form-signin" action="" method="post">
          <h2 class="form-signin-heading">INICIAR SESIÓN</h2>
          <label for="inputUsuario" class="sr-only">Usuario</label>
          <input type="text" name="usuario" id="inputUsuario" class="form-control" placeholder="Usuario" required autofocus>
          <label for="inputPassword" class="sr-only"> Contraseña</label>
          <input type="password" name="clave" id="inputPassword" class="form-control" placeholder="Contraseña" required>
          <div class="checkbox">
            <label>
              <input type="checkbox" value="remember-me"> Recuérdame
            </label>
          </div>
          <div class="centrar">
            <button class="btn btn-sky text-uppercase btn-lg" type="submit">Ingresar</button></br>
  		      <a href="registroCliente.php" class="text-center new-account" > Crear una cuenta </a>
          </div>
        </form>
      </div>
    </body>
  <script src="assets/js/jquery.js"></script>
    	<script src="assets/js/bootstrap.min.js"></script>
      <?php
      ob_end_flush();
      ?>
