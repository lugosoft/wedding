<?php
	include "funciones_db.php";
	
  $sql = "select i.id_usuario, i.seq, i.nombre, i.nombre_completo, i.confirmado, case when llego = 1 then 'SI' else 'NO' END as lleg  from invitados i where confirmado = 'SI'";
	
	$res = array();
	$res = queryDB($sql);
	
	$nroCol = count($res[0]);
	echo "Columnas Listadas: $nroCol <br>";
	echo "<table border='1' style=\"font-size: 16px;margin:0 0 0 5px;text-align: left;border: 1px solid #173F77;border-collapse: collapse;\">";
	
	/*
	if ($nroCol > 0){
		$tabla = 'Usuarios';
		$res2 = array();	
		$res2 = queryDB("SELECT t.object_id, c.name FROM sys.columns c JOIN sys.tables t ON c.object_id = t.object_id WHERE t.name = '".$tabla."'");
		$nroCol2 = count($res2[0]);
		if ($nroCol2 > 0){
			echo "<tr>";
			foreach ($res2 as &$fila2) {
				echo "<td>$fila2[1]</td>";
			}
			echo "</tr>";
		}
	}
	*/
	
	foreach ($res as &$fila) {	
		echo "<tr>";
		for($j=0;$j<$nroCol;$j=$j+1){
			echo "<td>$fila[$j]</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	if ($nroCol <= 0){
		$msg = getErrorDB();
		echo "ERROR: ".$msg;
	}
	
?>