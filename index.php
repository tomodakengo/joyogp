<!--

head内のmetaタグ(titleより下のところ)を随時編集してください。
og:title
og:url
og:image 絶対参照で「ogp.php?d=日付&$t=イベント名」を指定

-->
<?php

//以下、JOYより指定IDをスクレイピングしているだけなので、$str_titleにイベント名、$str_dayに日付を代入してあげるだけでhtml以下は動きます
require_once("phpQuery-onefile.php");
$id = $_GET['id'];
if (!$id) {
    header("Location: https://japan-o-entry.com/");
    exit();
}
$url = "https://japan-o-entry.com/event/view/{$id}";
$html = file_get_contents($url);
$str_title = phpQuery::newDocument($html)->find("#main")->find("table:eq(0)")->find("tr:eq(1)")->find("td")->text();
$str_day = phpQuery::newDocument($html)->find("#main")->find("table:eq(0)")->find("tr:eq(4)")->find("td")->text();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $str_title; ?>|Japan-O-entrY</title>
        <!--OGP-->
        <meta property="og:title" content="<?php echo $str_title; ?>|Japan-O-entrY" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://irohaori.work/pj/joyogp/index.php?id=<?php echo $id; ?>" />
        <meta property="og:width" content="1280px" />
        <meta property="og:height" content="720px" />
        <meta property="og:image" content="https://irohaori.work/pj/joyogp/ogp.php?d=<?php echo $str_day; ?>&t=<?php echo $str_title; ?>" />
        <meta property="og:site_name" content="Japan-O-entrY" />
        <meta property="og:description" content="<?php echo $str_title; ?>" />

        <!-- Facebook用設定 -->
        <meta property="fb:admins" content=" ※FacebookのAppIDがある場合は、別のmetaタグで指定、これはユーザーIDなのであまり使わないほうが良い※ " />

        <!-- ※Twitter共通設定 -->
        <meta name="twitter:card" content="summary_large_image" />
    </head>
    <body style="text-align: center;">
        <a href="<?php echo $url; ?>"><?php echo $url; ?></a>
        <div style="display:block;width:80%;margin:0 auto;">
            <img src="https://irohaori.work/pj/joyogp/ogp.php?d=<?php echo $str_day; ?>&t=<?php echo $str_title; ?>" style="width:100%;height:auto;">
        </div>
        <script>
            document.location.href = "<?php echo $url; ?>";
        </script>
    </body>
</html>