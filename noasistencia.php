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
      <title>NO Asisten a Boda</title>

      <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
      <style>
        * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }

        body {
          font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
          color: #333;
        }

        table {
          text-align: left;
          line-height: 40px;
          border-collapse: separate;
          border-spacing: 0;
          border: 2px solid #000066;
          width: 360px;
          margin: 50px auto;
          border-radius: .25rem;
        }

        thead tr:first-child {
          background: #000066;
          color: #fff;
          border: none;
        }

        th:first-child,
        td:first-child {
          padding: 0 15px 0 20px;
        }

        thead tr:last-child th {
          border-bottom: 3px solid #ddd;
        }

        tbody tr:last-child td {
          border: none;
        }

        tbody td {
          border-bottom: 1px solid #ddd;
        }

        td:last-child {
          text-align: center;
          padding-right: 0px;
        }

        .button {
          color: #aaa;
          cursor: pointer;
          vertical-align: middle;
          margin-top: -4px;
        }

        
      </style>
		</head>
		<body>
        <table>
          <thead>
            <tr>
              <th colspan="3">
                <?php
                  echo("Invitados que NO Asistiran:");
                ?>
              </th>
            </tr>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Celular</th>
            </tr>
          </thead>
          <tbody>
            <?php
              printNoAsistencia();
            ?>
          </tbody>
        </table>

		</body>
	</html>