  <?php
    //error_reporting(E_ERROR | E_PARSE);
    include "library/functions.php";
    function getFiltro($pID = 'TODOS'){
        return $pID;
    }
    $filtro = @getFiltro($_GET['filtro']);
    if($filtro == ''){
      $filtro = 'TODOS';
    }
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
      <title>Asistencia Boda</title>

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
              <?php $arrCnt = getArrCntAsistencia(); ?>
              <td bgcolor='#E6E6E6' align="center" style="color:black;font-weight:bold;font-size:12pt;">
                <a href="?filtro=TODOS">Todos (<?php echo $arrCnt['cntTodos']; ?>)</a>
              </td>
              <td bgcolor='#CEF6D8' align="center" style="color:black;font-weight:bold;font-size:12pt;">
                <a href="?filtro=LLEGO">Llegaron (<?php echo $arrCnt['cntLlego']; ?>)</a>
              </td>
              <td bgcolor='white' align="center" style="color:black;font-weight:bold;font-size:12pt;">
                <a href="?filtro=NO_LLEGO">Faltan (<?php echo $arrCnt['cntNoLlego']; ?>)</a>
              </td>
            </tr>
          </thead>
          <thead>
            <tr>
              <th colspan="3">
                <?php
                  if($filtro == 'TODOS')
                    echo("Lista de TODOS los Invitados:");
                  if($filtro == 'LLEGO')
                    echo("Invitados que ya LLEGARON:");
                  if($filtro == 'NO_LLEGO')
                    echo("Invitados que FALTAN por llegar:");
                ?>
              </th>
            </tr>
            <tr>
              <th>Nombre</th>
              <th>Celular</th>
              <th>Mesa</th>
            </tr>
          </thead>
          <tbody>
            <?php
              printAsistencia($filtro);
            ?>
          </tbody>
        </table>

		</body>
	</html>