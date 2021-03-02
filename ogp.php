<?php
//イベント日とイベント名を受け取る
$str_day = $_GET['d'];
$str_title = $_GET['t'];

// 本当は受け取ったものが空だったらのif分岐
//　空ならreadfileで「Japan-O-entrY.png」を指定してあげればOK

// 元になる画像を指定する
$path = 'Japan-O-entrY_ogp.png';

// 文字のフォントを指定する
$font = 'FLOPDesignFont.ttf';

// PNGファイルから画像を生成するよって示してあげる
$image = imagecreatefrompng($path);

// RGB形式で文字の色を指定してあげる
$color = ImageColorAllocate($image, 255, 255, 255);  

// 画像に文字を載せていく
#(元画像,フォントサイズ,テキストの傾き,上からの距離,左からの距離,フォント色,フォントファイル,表示したい文字列)
imagettftext($image, 46, 0, 50, 160, $color, $font, $str_day);      #日付を載せる
imagettftext($image, 64, 0, 50, 250, $color, $font, $str_title);    #イベント名を載せる

// headerで「これはPNG画像だぞ」と教えてあげる
header("Content-type: image/png");
header("Cache-control: no-cache");

// 画像を作る
imagepng($image);

// 画像を消してメモリを解放する
// でもこれをやるとOGPが反応しないのでコメントアウト
//imagedestroy($image);
?>