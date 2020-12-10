<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Title</title>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script>
        function getMoreItems(){
            let offset = $('#more').attr('offset');
            let limit = $('#more').attr('limit');
            let str = "action=moreItems&offset="+offset+"&limit="+limit;

            $.ajax({
                type: "GET",
                url: "server.php",
                data: str,
                success: function(answer){
                    if ($.trim($(answer).html())==''){
                        $("#more").hide();
                    } else {
                        $("#msg").append(answer);
                        $('#more').attr('offset', (+offset + 2));
                    }
                }
            })
        }
    </script>
</head>
<body>
<div id="msg" class="container">
    <?php

    require 'Singleton.php';
    require 'Database.php';

    $ob = Database::call();
    $mas = $ob->show("goods", 0, 2);
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
    ?>
</div>

<input type="button" offset=2 limit=2 name="more" id="more" value="показать еще" onclick = "getMoreItems()" /></td>
</body>
