<h1><?php echo h($name) ?>さんの投稿一覧</h1>
<?php
    foreach($datas as $data):
        echo h($data['Data']['text']);
        echo '(';
        echo h($data['Data']['date']);
    endforeach;
?>