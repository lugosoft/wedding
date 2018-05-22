<?php 
include "db/funciones_db.php";
include "db/consultas.php";
include("phpmailer/class.phpmailer.php");
include("phpmailer/class.smtp.php");
require_once 'conf_mail.php';

$URL_SERVIDOR = 'http://receptivosbackup.com/wedding/';

/*********************************************************
 * Author    : Luis Gonzalez
 * Function  : enviarCorreo
 * Parameters: $email: Lista de emails de los destinatarios, $usuarios: Lista de nombres de los destinatarios
			   $asunto asunto del email, $mensaje cuerpo del mensaje, $archivos array de rutas de archivos adjuntos
 * Return    : Estatus del envio
 * Example   : enviarCorreo("destinatario@dominio.com","Carmen Perez","Datos de Acceso al Sistema","<html>...</html>","");
 **********************************************************/
function enviarCorreo($emails,$usuarios,$asunto,$mensaje,$archivos=array())
{
	$mail=new PHPMailer();
	
	$mail->SMTPDebug  = MAIL_DEBUG;
	
	$mail->IsSMTP();
	$mail->SMTPAuth=true;
	
	$mail->Host= MAIL_HOST;
	$mail->Port= MAIL_PORT;
	
	$mail->Username= MAIL_USER;
	$mail->Password= MAIL_PASS;
	
	if (defined("MAIL_SECURE_SMTP")) {
		$mail->SMTPSecure= MAIL_SECURE_SMTP;
	}
	
	if (defined("MAIL_FROM")) {
		$mail->SetFrom(MAIL_FROM, MAIL_FROMNAME);
		
		if ( MAIL_REPLYTO == 1 ) {
			$mail->AddReplyTo(MAIL_FROM, MAIL_FROMNAME);
		}
	}
	// Validar si es necesario
	$mail->SMTPKeepAlive = true;
	
	$mail->WordWrap   = MAIL_WORDWRAP; // set word wrap
	
	
	$mail->Subject=$asunto;
	// Para pruebas (En manteniemiento) NO se envía al correo indicado sino a los desarrolladores
  if (MAIL_STATUS == 1) {
    $arrEmails = explode(";",$emails);
    $arrUsuarios = explode(";",$usuarios);
    for($i=0;$i<=count($arrEmails)-1;$i++){
      $email = $arrEmails[$i];
      $usuario = $arrUsuarios[$i];
      $mail->AddAddress($email,$usuario);
    }
  }else{
    $mail->AddAddress(MAIL_DEVELOP1,'Developer 1');
    $mail->AddAddress(MAIL_DEVELOP2,'Developer 2');
  }
	$mail->IsHTML(true); // send as HTML
	$mail->MsgHTML($mensaje);
	
	//attachments
	$totalElementos = count($archivos);
	for ($i = 0; $i < $totalElementos; $i++) 
	{
		$mail->AddAttachment($array[$i], $array[$i+1]); // attachment
		$i++;
	}
	
	//send
	if(!$mail->Send()) 
	{
		throw new Exception("Error al Enviar Correo Electr&oacute;nico.- ".$mail->ErrorInfo);
	} 
	else
	{
		$mail->ClearAddresses();
		$mail->ClearReplyTos();
		$mail->SmtpClose();
		
		return true;
	}
}

function enviarCorreoConfirmacion($pUserId, $pNombresInvitados, $pEmailsInivitados, $pInvitados){
  global $URL_SERVIDOR;
  $res = 'OK';
  //Se obtiene la plantilla del correo
  $body = file_get_contents('mail_confirmacion.html');
  $body = str_replace("[userId]", $pUserId, $body);
  $body = str_replace("[invitados]", $pInvitados, $body);
  $body = str_replace("[server_url]", $URL_SERVIDOR, $body);
  
  if (enviarCorreo($pEmailsInivitados, $pNombresInvitados, "Te esperamos en nuestra boda", $body)) {
    // Correo enviado con éxito
    $res = 'OK';
  } else {
    // Error al enviar correo
    $res = 'KO';
  }
  return $res;
}

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
    $nombres = '';
    $emails = '';
    $invitados = '';
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
      // Se consulta la info del invitado para agregarlo como destinatario
      $res = array();
      $sql2  = @getSql("queryInvitadosByUserIdSeq", $userId, $guestsList[$i]);
      $res = queryDB($sql2);
      foreach ($res as &$fila) {
        if($invitados=='')
          $invitados = $fila[1];
        else
          $invitados = $invitados."<br>".$fila[1];
        if($fila[2] != ''){
          if($nombres=='')
            $nombres = $fila[0];
          else
            $nombres = $nombres.";".$fila[0];
          
          if($emails=='')
            $emails = $fila[2];
          else
            $emails = $emails.";".$fila[2];
        }
      }
    }
    if($nombres != ''){
      $sendEmail = enviarCorreoConfirmacion($userId, $nombres, $emails, $invitados);
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
