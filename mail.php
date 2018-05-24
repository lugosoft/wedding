<?php
    Require_once "library/functions_confirmation.php";
    
    $guests= $_POST["guests"];
    $message= "";
    $userId= $_POST["user_id"];
    $guestsText = "";
    if($guests != '99'){
      $guestsList = explode(",",$guests);
      for($i=0;$i<count($guestsList);$i++){
        $name = getNameInvitado($userId, $guestsList[$i]);
        if($guestsText == "")
          $guestsText = $name;
        else
          $guestsText = $guestsText.", ".$name;
      }
      $r = saveConfirmation($guests, $userId, $message);
      if($r=='OK'){
        if($guests == '0'){
          echo "OK|Lamentamos que no nos puedas acompañar y te agradecemos que nos hayas informado.<br>Bendiciones!!";
        }else{
          $pos = strripos ($guestsText, ',');
          if($pos){
            $guestsText = substr($guestsText, 0, $pos).' y '.substr($guestsText, $pos+1);
          }
          echo "OK|Gracias por tu confirmaci&oacute;n.<br>Invitados Confirmados: $guestsText";
        }
      }else{
        echo "KO|$r</a></div>";
      }
    }else{
      echo "KO|Por favor indicanos los invitados que asistir&aacute;n en la lista desplegable de abajo.";
    }
    
?>
