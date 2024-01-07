<?php   

    session_start();
    $image = imagecreatetruecolor(120, 30) or die("Cannot Initialize new GD image stream"); // 120x30 pixels
    $background = imagecolorallocate($image, 0xFF, 0xFF, 0xFF); // white background
    imagefill($image, 0, 0, $background); // fill the image with white background
    $lineColor = imagecolorallocate($image, 0xCC, 0xCC, 0xCC); // grey line color
    $textColor = imagecolorallocate($image, 0x33, 0x33, 0x33); // black text color
    
    for($i=0; $i < 8; $i++) {
        imagesetthickness($image, rand(1,3)); // thickness of the lines
        imageline($image, 0, rand(0,30), 120, rand(0,30), $lineColor); // draw the lines
    }

    $numbers = '';
    
    for($x = 15; $x <= 95; $x += 20) {
        $number = rand(0, 9);
        $numbers .= $number;
        imagechar($image, rand(3, 5), $x, rand(2, 14), $number, $textColor); // draw the numbers
    }
    $_SESSION['captcha'] = $numbers; // store the numbers in session variable
    header('Content-type: image/png'); // output the image as png
    imagepng($image); // output the image as png
    imagedestroy($image); // destroy the image
?>