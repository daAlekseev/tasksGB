<?php
        for($i=1; $i<=$goodId; $i++){
            if(isset($_POST['toCart'.$i])){
                $num = checkGoods($link, "cart", $sessId, $i);
                if($num > 0){
                    cartUpdate($link, "cart", $sessId, $i);
                }
                else{
                    cartInsert($link, "cart", $sessId, $i);
                }
            }
        }
    ?>