<?php
require ('pdo.php');
$max=$pdo->query('SELECT COUNT( * ) AS num FROM video')->fetch(PDO::FETCH_ASSOC)['num'];
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' href='stylesheet.css'>
        <meta charset='utf-8'>
        <title></title>
    </head>
    <body>
        <iframe width='960' height='540' src='https://www.youtube.com/embed/<?=$_GET['v'];?>?rel=0&autoplay=1' frameborder='0' allowfullscreen></iframe>
        <div class='videos'>
            <?php for ($i=0; $i<10; $i++): ?>
            <div class='video'>
                <?php $next_video = $pdo->query('select video_id,title,thumbnails,time,length from video where id = '.mt_rand(1, $max))->fetch(PDO::FETCH_ASSOC); ?>
                <a href='video.php?v=<?=$next_video['video_id'];?>'><img class='next_thum' src='https://i.ytimg.com/vi/<?=$next_video['video_id'];?>/<?=$next_video['thumbnails']?>'></a>
                <p class='length'><?=$next_video['length'];?></p>
                <p class='title'><?=mb_convert_encoding($next_video['title'], 'utf8', 'cp932');?></p>
            </div>
            <?php endfor; ?>
        </div>

        <a class='link' href='top.php'>トップに戻る</a>
        <script type="application/javascript" src="https://embed.nicovideo.jp/watch/1581304203/script?w=640&h=360"></script><noscript><a href="https://www.nicovideo.jp/watch/1581304203">キラッとプリ☆チャン　第95話「だいあがおジャマ？　キラッツの秘密を探るんだよん！」</a></noscript>
    </body>
</html>