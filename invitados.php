  <?php
    //error_reporting(E_ERROR | E_PARSE);
    include "library/functions.php";
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
      <title>Invitados Boda</title>

      <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
      <link rel="stylesheet" href="../css/main.css">
      <style>
        table {
            font-family: arial, sans-serif;
            width: 300px;
        }

        th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
            background-color: #dddddd;
        }

        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        
        input[type=checkbox]
        {
          /* Double-sized Checkboxes */
          -ms-transform: scale(2); /* IE */
          -moz-transform: scale(2); /* FF */
          -webkit-transform: scale(2); /* Safari and Chrome */
          -o-transform: scale(2); /* Opera */
          padding: 10px;
        }
        
        .txt-btn
        {
          /* Checkbox text */
          font-size: 150%;
          display: inline;
        }
        .txt-btnchecked
        {
          /* Checkbox text */
          font-size: 150%;
          display: inline;
          background-color: #59F1C6;
        }
      </style>
		</head>
		<body>
      <form class="booking-form2" id="myForm2" action="">
        <input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>">
      <?php
        //echo $_GET['user_id'];
        printInfoRecepcion($_GET['user_id']);
      ?>
      <center><div class="alert-msg2"></div></center>
      </form>
			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="js/main5.js"></script>	
		</body>
	</html>