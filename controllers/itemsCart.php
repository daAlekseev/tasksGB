<?php
    $action = actionCart($link, "select *", "cart", $sessId);
    if($action){
        $sum = 0;
        $count = 0;
        $items = " ";
        while($row = mysqli_fetch_assoc($action)){
            $goodId = $row['goodId'];
            $goodCount = $row['count'];
            $row1 = getOneGood($link, "goods", $goodId);
            while($row1):?>
                <div class="itemInfo">
                    <a class="cartLink" href = "good.php?id=<?= $goodId?>">
                    <p class="text">Товар: <span class="info"><?= $row1['title']?></span></p></a>
                    <p class="text">Кол-во: <span class="info"><?= $goodCount?></span></p>
                    <p class="text">Цена без скидки: <span class="info"><?= $row1['price']*$goodCount?> у.е.</span></p>
                </div>
            <?php
                $count += $goodCount;
                $sum += $row1['price']*$goodCount;
                
                
            
                $items .= $row1['title']."(x" .$goodCount .") ";
                break;
            endwhile;
            $today = date('w');
            if($today >= 1 && $today <=5 && $count > 2){
                $sum *=0.9;
            }
            
           } 
           echo "<p>Общая сумма с учетом скидки: $sum у.е.</p>";
        }
        ?>