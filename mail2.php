<?php
    Require_once "library/functions_confirmation.php";
    /*
    $guests= $_POST["guests"];
    $message= $_POST["message"];
    $userId= $_POST["user_id"];
    */
    $seq = 0;
    $userId = 'NULL';
    
    $seqSelected = 0;
    $checked = 'false';
    
    if(isset($_GET["seq"]))
      $seq = $_GET["seq"];
    
    if(isset($_GET["user_id"]))
      $userId = $_GET["user_id"];
    /*
    if(isset($_GET["invitado"]))
      $seqSelected = $_GET["invitado"];
    
    if($seq==$seqSelected)
      $checked = 'true';
    */
    setLlegada($userId, $seq);
    echo "seq[".$seq."]: $userId"/*.$checked."   seqSelected:".$seqSelected*/;
 
?>
