<?php
require ('pdo.php');
$select=$pdo->query('select channel_id,thumbnails from channel');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <link rel='stylesheet' href='stylesheet.css'>
        <title>チャンネル一覧</title>
    </head>
    <body>
        <a class='link' href='form.php'>フォームにジャンプ</a>

        <?php while($select_result = $select->fetch(PDO::FETCH_ASSOC)) : ?>
        <a class='top_icon' style='zoom:10%;' href='channel_video.php?c=<?= $select_result['channel_id']; ?>'><img src=<?= $select_result['thumbnails']; ?>></a>
        <?php endwhile; ?>
        <video src="abc.mp4" controls></video>
    </body>
</html>