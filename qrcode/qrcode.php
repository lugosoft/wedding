<?php
  include "../phpqrcode/qrlib.php"; 
  
  //set it to writable location, a place for temp generated PNG files
  $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;

  //html PNG location prefix
  $PNG_WEB_DIR = 'temp/';   

  //ofcourse we need rights to create temp dir
  if (!file_exists($PNG_TEMP_DIR))
      mkdir($PNG_TEMP_DIR);

  $filename = $PNG_TEMP_DIR.'test.png';

  $matrixPointSize = 6;
  $errorCorrectionLevel = 'L';
  $userId = $_POST['user_id'];
  $url = $_POST['url'];
  
  //$data = 'Eventos Villa Rocío'.' - Mesa 14'.chr(13).chr(10).'Invitados:'.chr(13).chr(10).'  -Tulio Ruiz'.chr(13).chr(10).'  -Yaneth Martinez';
  $data = $url.'?user_id='.$userId;
  
  //$filename = $PNG_TEMP_DIR.'test'.md5($data.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
  $filename = $PNG_TEMP_DIR.$userId.'.png';
  QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2); 
  
  echo "<h2>Codigo QR Generado para $userId!</h2><br>";  
  echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';
  
?>