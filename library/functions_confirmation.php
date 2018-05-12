<?php 
include "db/funciones_db.php";
include "db/consultas.php";

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

function saveConfirmation($guests, $userId, $obs){
  $guestsList = explode(",",$guests);
  $result = 'OK';
  $nroConfirmados = 0;
  $confirm = 'SI';
  // Se resetea los que estaban confirmados previamente
  $sql  = @getSql("resetInvConfirmado", $userId);
  $r = modifyDB($sql);
  
  // Si no van, se almacena que nadie va
  if($guests=='0'){
    $nroConfirmados = 0;
    $obs = 'NO ASISTIRAN '.$obs;
  }else{
    for($i=0;$i<count($guestsList);$i++){
      $sql  = @getSql("updateInvConfirmado", $userId, $guestsList[$i]);
      $r = modifyDB($sql);
      $nroConfirmados++;
      if ($r <= 0){
        // Error al actualizar
        $msg = getMsgCaractEsp(getErrorDB(),'si');
        $result = 'Error confirmando. '.$msg;
        $obs = $result;
        $nroConfirmados = 0;
        $confirm = 'NO';
        break;      
      } 
    }
  }
  
  // Se almacena que ya confirmo
  $sql  = @getSql("updateUsuarioConfirmado", $userId, $nroConfirmados, $confirm, $obs);
  $r = modifyDB($sql);
  
  return $result;
}

function setLlegada($userId, $seq){
  // Se resetea los que estaban confirmados previamente
  $sql  = @getSql("setLlegadaInvitado", $userId, $seq);
  $r = modifyDB($sql);
}
?>
