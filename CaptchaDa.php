<?php

  /**
   * Author: Sanix darker
   * [CaptchaDa description]
   * @param [type] $width                  [description]
   * @param [type] $height                 [description]
   * @param [type] $codelenght             [description]
   * @param [type] $space_between_caracter [description]
   */
  function CaptchaDa($width,$height,$codelenght, $space_between_caracter){
    
    if(!isset($space_between_caracter))
      $space_between_caracter = 10;
    

    if(!isset($_SESSION))
      session_start();
    
    $liste = md5('134679ACEFGHIJLMNPRTUVWXY');
    $code = '';
    $image = @imagecreate($width, $height) or die('Impossible d\'initializer GD');
    for( $i=0; $i<$space_between_caracter; $i++ )
       imageline($image,mt_rand(0,$width), mt_rand(0,$height),mt_rand(0,$width), mt_rand(0,$height),imagecolorallocate($image, mt_rand(230,255),mt_rand(230,255),mt_rand(230,255)));
    
    for( $i=0, $x=0; $i<$codelenght; $i++ ) 
    {
       $charactere = substr($liste, rand(0, strlen($liste)-1), 1);
       $x += $space_between_caracter + mt_rand(0,$space_between_caracter);
       imagechar($image, mt_rand(3,4), $x, mt_rand(4,20), $charactere,
       imagecolorallocate($image, mt_rand(0,155), mt_rand(0,155), mt_rand(0,155)));
       $code .= ($charactere);
    } 
    
    header('Content-Type: image/jpeg');
    imagejpeg($image);
    imagedestroy($image);

    $_SESSION['CAPTCHADA'] = $code;
  }

  function getBox(){
    return '<img style="width: 100%;" src="CaptchaDa.php"><br><input type="text" name="CAPTCHADA" placeholder="Write the Code here." style="width: 100%;">';
  }

  (isset($_REQUEST['getbox']))? getBox(): CaptchaDa(120,50,7,10);

?>