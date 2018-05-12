<?php 
session_start();

include "db/funciones_db.php";
include "db/consultas.php";


$MAX_FILAS_REPORTE = 10;

function getMsgCaractEsp($texto, $js = 'no'){
	if ($js == 'no'){
		$texto = str_replace("a'","&aacute;",$texto);
		$texto = str_replace("e'","&eacute;",$texto);
		$texto = str_replace("i'","&iacute;",$texto);
		$texto = str_replace("o'","&oacute;",$texto);
		$texto = str_replace("u'","&uacute;",$texto);
		
		$texto = str_replace("A'","&Aacute;",$texto);
		$texto = str_replace("E'","&Eacute;",$texto);
		$texto = str_replace("I'","&Iacute;",$texto);
		$texto = str_replace("O'","&Oacute;",$texto);
		$texto = str_replace("U'","&Uacute;",$texto);		
		
		$texto = str_replace("n'","&ntilde;",$texto);
		$texto = str_replace("N'","&Ntilde;",$texto);
		
		$texto = str_replace("á","&aacute;",$texto);
		$texto = str_replace("é","&eacute;",$texto);
		$texto = str_replace("í","&iacute;",$texto);
		$texto = str_replace("ó","&oacute;",$texto);
		$texto = str_replace("ú","&uacute;",$texto);
		
		$texto = str_replace("Á","&Aacute;",$texto);
		$texto = str_replace("É","&Eacute;",$texto);
		$texto = str_replace("Í","&Iacute;",$texto);
		$texto = str_replace("Ó","&Oacute;",$texto);
		$texto = str_replace("Ú","&Uacute;",$texto);		
		
		$texto = str_replace("ñ","&ntilde;",$texto);
		$texto = str_replace("Ñ","&Ntilde;",$texto);
		
	}else{			
	
		$texto = str_replace("a'","'+String.fromCharCode(".ord('á').")+'",$texto);
		$texto = str_replace("e'","'+String.fromCharCode(".ord('é').")+'",$texto);
		$texto = str_replace("i'","'+String.fromCharCode(".ord('í').")+'",$texto);
		$texto = str_replace("o'","'+String.fromCharCode(".ord('ó').")+'",$texto);
		$texto = str_replace("u'","'+String.fromCharCode(".ord('ú').")+'",$texto);
		
		$texto = str_replace("A'","'+String.fromCharCode(".ord('Á').")+'",$texto);
		$texto = str_replace("E'","'+String.fromCharCode(".ord('É').")+'",$texto);
		$texto = str_replace("I'","'+String.fromCharCode(".ord('Í').")+'",$texto);
		$texto = str_replace("O'","'+String.fromCharCode(".ord('Ó').")+'",$texto);
		$texto = str_replace("U'","'+String.fromCharCode(".ord('Ú').")+'",$texto);		
		
		$texto = str_replace("n'","'+String.fromCharCode(".ord('ñ').")+'",$texto);
		$texto = str_replace("N'","'+String.fromCharCode(".ord('Ñ').")+'",$texto);	
		
		$texto = str_replace("á","'+String.fromCharCode(".ord('á').")+'",$texto);
		$texto = str_replace("é","'+String.fromCharCode(".ord('é').")+'",$texto);
		$texto = str_replace("í","'+String.fromCharCode(".ord('í').")+'",$texto);
		$texto = str_replace("ó","'+String.fromCharCode(".ord('ó').")+'",$texto);
		$texto = str_replace("ú","'+String.fromCharCode(".ord('ú').")+'",$texto);
		
		$texto = str_replace("Á","'+String.fromCharCode(".ord('Á').")+'",$texto);
		$texto = str_replace("É","'+String.fromCharCode(".ord('É').")+'",$texto);
		$texto = str_replace("Í","'+String.fromCharCode(".ord('Í').")+'",$texto);
		$texto = str_replace("Ó","'+String.fromCharCode(".ord('Ó').")+'",$texto);
		$texto = str_replace("Ú","'+String.fromCharCode(".ord('Ú').")+'",$texto);		
		
		$texto = str_replace("ñ","'+String.fromCharCode(".ord('ñ').")+'",$texto);
		$texto = str_replace("Ñ","'+String.fromCharCode(".ord('Ñ').")+'",$texto);
		
		$texto = str_replace("'","'+String.fromCharCode(".ord("'").")+'",$texto);
		
	}
		
	return $texto;
}

function getNameInvitado($userId, $seq){
  $res = array();
	$sql  = @getSql("queryInvitadosByUserId",$userId);
	$res = queryDB($sql);
  $i = 0;
  $name = "";
	foreach ($res as &$fila) {
    $i++;
    if($i==$seq){
      $name = $fila[0];
      break;
    }
  }
  return $name; 
}


function getInvitados($userId){
  $res = array();
	$sql  = @getSql("queryInvitadosByUserId",$userId);
	$res = queryDB($sql);
  $i = 0;
  $listInv = "";
	foreach ($res as &$fila) {
    $i++;
  }
  return array('cnt' => $i, 'lista' =>$res); 
}

function getSeqInvitadosConfirmados($userId){
  $res = array();
	$sql  = @getSql("queryInvitadosConfirm",$userId);
	$res = queryDB($sql);
  $i = 0;
  $values = "";
	foreach ($res as &$fila) {
    $i++;
    if($values==""){
      $values = $fila[0];
    }else{
      $values = $values.",".$fila[0];
    }
  }
  return array('cnt' => $i, 'values' => $values, 'lista' =>$res); 
}

function getTextoInvitados($userId){
  $res = array();
  $r = array();
  $r = getInvitados($userId);
  $cnt = $r['cnt'];
  $res = $r['lista'];
  
  $i = 0;
  $listInv = "";
	foreach ($res as &$fila) {
    $i++;
    if($i == 1){
      $listInv = $fila[0];
    }elseif ($i < $cnt){
      $listInv = $listInv.', '.$fila[0];
    }else{
      $listInv = $listInv.' y '.$fila[0];
    }
	}
  
	return "Invitaci&oacute;n para:<br>".$listInv;
}

function getOpcionesInvitados($userId){
  $res = array();
	$sql  = @getSql("queryOpcInvitados",$userId);
	$res = queryDB($sql);
  $i = 0;
  $listInv = "";
	foreach ($res as &$fila) {
    $i++;
  }
  return array('cnt' => $i, 'lista' =>$res); 
}

function printOpcionesConfir($userId){
  
  $res = array();
  $r = array();
  $r = getOpcionesInvitados($userId);
  $cnt = $r['cnt'];
  $res = $r['lista'];
  
  $r = getSeqInvitadosConfirmados($userId);
  $cntConfirm = $r['cnt'];
  $valuesConfirm = $r['values'];
  
  if($cnt == 0){
    return;
  }elseif ($cnt == 1){
    if($cntConfirm == 0)
      echo"<option value='99' selected>Indicanos aqu&iacute; si asistir&aacute;s</option>";
    else
      echo"<option value='99'>Indicanos aqu&iacute; si asistir&aacute;s</option>";
    
    echo"<option value='0'>No Asistir&eacute;</option>";
  }else{
    if($cntConfirm == 0)
      echo"<option value='99' selected>Indicanos aqu&iacute; quienes asistir&aacute;n</option>";
    else
      echo"<option value='99'>Indicanos aqu&iacute; quienes asistir&aacute;n</option>";
    
    echo"<option value='0'>No Asistiremos</option>";
  }
  
  $rInv = getInvitados($userId);
  $resInv = $rInv['lista'];
  $inv = array();
  $inv[1] = "";
  $inv[2] = "";
  $inv[3] = "";
  $inv[4] = "";
  $inv[5] = "";
  $j = 0;
  foreach ($resInv as &$fila2) {
    $j++;
    $inv[$j] = $fila2[0];
  }
  
  $i = 0;
  $listInv = "";
	foreach ($res as &$fila) {
    $i++;
    $texto = $fila[0];
    $values = "";
    if (strpos($texto, "{1}") !== false){
      $texto = str_replace("{1}",$inv[1],$texto);
      $values = $values.",1";
    }
    if (strpos($texto, "{2}") !== false){
      $texto = str_replace("{2}",$inv[2],$texto);
      $values = $values.",2";
    }
    if (strpos($texto, "{3}") !== false){
      $texto = str_replace("{3}",$inv[3],$texto);
      $values = $values.",3";
    }  
    if (strpos($texto, "{4}") !== false){
      $texto = str_replace("{4}",$inv[4],$texto);
      $values = $values.",4";
    }  
    if (strpos($texto, "{5}") !== false){
      $texto = str_replace("{5}",$inv[5],$texto);
      $values = $values.",5";
    }
    
    if ($values == "")
      $values = '1';
    else
      $values = substr ($values, 1);
    
    if($values==$valuesConfirm)
      echo"<option value='$values' selected>$texto</option>";
    else
      echo"<option value='$values'>$texto</option>";
	}
}

function printInvitadosConfirmados($userId){
  $r = getSeqInvitadosConfirmados($userId);
  $cntConfirm = $r['cnt'];
  $guests = $r['values'];
  
  $guestsText = "";
  if($guests != ''){
    $guestsList = explode(",",$guests);
    for($i=0;$i<count($guestsList);$i++){
      $name = getNameInvitado($userId, $guestsList[$i]);
      if($i == 0){
        $guestsText = $name;
      }elseif (($i+1) < $cntConfirm){
        $guestsText = $guestsText.", ".$name;
      }else{
        $guestsText = $guestsText." y ".$name;
      }
    }
    echo "<br><div class='col-lg-12 d-flex flex-column'><a style='color:green; font-size:150%;'>Invitados Confirmados: $guestsText</a></div><br>";
  }
}

function printInvitadosConfirmados2($userId){
  $r = getSeqInvitadosConfirmados($userId);
  $cntConfirm = $r['cnt'];
  $guests = $r['values'];
  
  $guestsText = "";
  if($guests != ''){
    $guestsList = explode(",",$guests);
    for($i=0;$i<count($guestsList);$i++){
      $name = getNameInvitado($userId, $guestsList[$i]);
      if($i == 0){
        $guestsText = $name;
      }elseif (($i+1) < $cntConfirm){
        $guestsText = $guestsText.", ".$name;
      }else{
        $guestsText = $guestsText." y ".$name;
      }
    }
    echo "<div class='col-lg-12 d-flex flex-column'><a style='color:green; font-size:150%;'>Invitados Confirmados: $guestsText</a></div>";
  }
}

function isInvitadoConfirmado($userId){
  $r = getSeqInvitadosConfirmados($userId);
  $cntConfirm = $r['cnt'];
  $guests = $r['values'];
  
  if($cntConfirm > 0){
    return true;
  }else{
    return false;
  }
}

function printInfoRecepcion($userId){
  $isConfirmado = isInvitadoConfirmado($userId);
  $data = '';
  $mesa = '';
  $listaInvitados = '';
  $res = array();
  if($isConfirmado){
    $mesa = "14";
    $r = getSeqInvitadosConfirmados($userId);
    $cntConfirm = $r['cnt'];
    $valuesConfirm = $r['values'];
    $res = $r['lista'];
    $listaInvitados = '';
    foreach ($res as &$fila) {
      $checked = '';
      if($fila[3] == '1')
        $checked = 'checked';
      $inv = "<input class='chk-btn' type='checkbox' name='invitado' seq='$fila[0]' value='$fila[0]' $checked>&nbsp;<a class='txt-btn'>".$fila[2]."</a>";
      if($listaInvitados==''){
        $listaInvitados = $inv;
      }else{
        $listaInvitados = $listaInvitados.'<br><br>'.$inv;
      }
    }
    //$listaInvitados = "Juancho Ruiz<br>Yaneth Martines";
    $data = "<center><table>";
    $data = $data."<tr><th><a style='font-size:200%;'>Mesa</a><br><a style='font-size:500%;'>$mesa</a></th></tr>";
    $data = $data."<tr><td><center><div class='alert-msg1'></div><a style='font-size: 200%;'><b>Invitados</b></a></center>";
    $data = $data.$listaInvitados;
    $data = $data."</td></tr>";
    $data = $data."</table></center>";
    
  }else{
    $data = "<center><a style='color:red; font-size:50;'>Invitado<br>NO<br>encontrado</a></center>";
  }
  echo $data;
}

?>
