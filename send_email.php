  <?php
    include "library/functions_confirmation.php";
  ?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
    <head>
      <!-- Mobile Specific Meta -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Favicon-->
      <link rel="shortcut icon" href="../img/fav.png">
      <!-- Author Meta -->
      <meta name="author" content="CodePixar">
      <!-- Meta Description -->
      <meta name="description" content="">
      <!-- Meta Keyword -->
      <meta name="keywords" content="">
      <!-- meta character set -->
      <meta charset="UTF-8">
      <!-- Site Title -->
      <title>Send Email Test</title>
		</head>
		<body>
        Enviar Correo:&nbsp;&nbsp;<?php echo enviarCorreoConfirmacion('albertog', 'Alberto;Andrea', 'lugo.ing@gmail.com;moni.olivella@gmail.com', 'Alberto Gonzalez<br>Andrea Olivella'); ?>
		</body>
	</html>