<?php
require ('pdo.php');
define('PATH', "C:\\Users\\godin\\AppData\\Local\\Programs\\Python\\Python38-32\\python.exe \"C:\\xampp\\htdocs\\info_get.py\" ");

$time_start = microtime(TRUE);

$cmd0 = PATH.$_POST['channel_id'].' '.'0';
exec($cmd0, $output);

$time = microtime(TRUE) - $time_start;
print($time);
print("\n");
foreach($output as $i){
    print(mb_convert_encoding($i,'utf8', 'cp932'));
}

?>


<html>
    <a href='top.php'>トップにジャンプ</a>
</html>