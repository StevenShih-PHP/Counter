<?php
    header("Content-type: image/jpeg");
    $img = imagecreate(20,20);
    imagecolorallocate($img, 255, 255, 255);

    $red = imagecolorallocate($img, 0, 0 ,255);
    $font = imageloadfont('Impact');
    $text = $_GET["Num"];

    imagestring($img, $font, 0, 0, $text, $red);
    imagejpeg($img);
    imagedestroy($img);
?>