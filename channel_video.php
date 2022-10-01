<?php
require ('pdo.php');
$max=$pdo->query('SELECT COUNT( * ) AS num FROM video WHERE channel_id = \''.$_GET['c'].'\'')->fetch(PDO::FETCH_ASSOC)['num'];
$channel = $pdo->query('SELECT title,thumbnails FROM channel WHERE channel_id = \''.$_GET['c'].'\'')->fetch(PDO::FETCH_ASSOC);
$select = $pdo->query('SELECT video_id,title,thumbnails,time,length FROM video WHERE channel_id = \''.$_GET['c'].'\' ORDER BY time desc');
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' href='stylesheet.css'>
        <meta charset='utf-8'>
        <title></title>
    </head>
    <body>
        <img class='channel_icon' style='zoom:50%;' src=<?=$channel['thumbnails'];?>>
        <h1 style='zoom:200%;'><?=mb_convert_encoding($channel['title'],'utf8','cp932');?></h2>

        <h1><?=$max;?></h1>

        <div class='videos'>
            <?php while ($select_result = $select->fetch(PDO::FETCH_ASSOC)) : ?>
            <div class='video'>
                <a href='video.php?v=<?=$select_result['video_id'];?>'><img class='thum' src='https://i.ytimg.com/vi/<?=$select_result['video_id'];?>/<?=$select_result['thumbnails'];?>'></a>
                <p class='length'><?=length_gene($select_result['length']);?></p>
                <p class='title'><?=mb_convert_encoding($select_result['title'], 'utf8', 'cp932');?></p>
                <p><?=time_gene($select_result['time']);?></p>
            </div>
            <?php endwhile; ?>
        </div>
        
    </body>
</html>

<?php

function length_gene($str){
    $length1 = ltrim($str, 'PT');
    $length2 = rtrim($length1,'S');
    if(strpos($length2, 'H') !== FALSE){
        $length_H_MS = explode('H', $length2);
        $length_M_S = explode('M', $length_H_MS[1]);
        if(strlen($length_M_S[0]) === 1){
            $length_M_S[0] = '0'.$length_M_S[0];
        }
        if(strlen($length_M_S[0]) === 0){
            $length_M_S[0] = '00';
        }
        if(strlen($length_M_S[1]) === 1){
            $length_M_S[1] = '0'.$length_M_S[1];
        }
        if(strlen($length_M_S[1]) === 0){
            $length_M_S[1] = '00';
        }
        return $length_H_MS[0].':'.implode(':', $length_M_S);
    }
    elseif(strpos($length2, 'M') !== FALSE){
        $length_M_S = explode('M', $length2);
        if(strlen($length_M_S[1]) === 1){
            $length_M_S[1] = '0'.$length_M_S[1];
        }
        if(strlen($length_M_S[1]) === 0){
            $length_M_S[1] = '00';
        }
        return implode(':', $length_M_S);
    }
    else{
        if(strlen($length2) === 1){
            $length2 = '0'.$length2;
        }
        return '0:'.$length2;
    }
}

function time_gene($time){
    $time1 = substr($time, 0, 16);
    $time2 = explode('T', $time1);
    $time2[0] = str_replace('-','/',$time2[0]);
    return implode(' - ', $time2);
}