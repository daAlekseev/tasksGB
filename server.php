<?php

require 'Singleton.php';
require 'Database.php';

$action = strip_tags($_GET['action']);
$offset = (int)$_GET['offset'];
$limit = (int)$_GET['limit'];

$ob = Database::call();
$mas = $ob->show("goods", $offset, $limit);

if($action == "moreItems"){
    foreach ($mas as $row): ?>
        <div class="item">
            <div>
                <h3 class="header_3"><?= $row['title']?></h3>
                <img src="<?= $row['img']?>"></a>
            </div>
            <div>
                <h3 class="header_3">Описание товара</h3>
                <p><?= nl2br($row['part_description'])?></p>
                <h3><?= $row['price']?> у.е.</h3>
            </div>
        </div>
    <?php
    endforeach;
}
