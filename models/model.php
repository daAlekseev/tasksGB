<?php

function getAll($link, $table){
    $sql = "select * from $table";
    $query = mysqli_query($link, $sql);
    $res = [];
    while($row = mysqli_fetch_assoc($query)){
        $res[] = $row;
    }
    return $res;
}

function updateViews($link, $table, $id){
    $sql = "update $table SET views = views+1 where id = '$id'";
    $query = mysqli_query($link, $sql);
    return true;
}

function getOneGood($link, $table, $id){
    $sql = "select * from $table where id = $id";
    $query = mysqli_query($link, $sql);
    return $row = mysqli_fetch_assoc($query); 
}
   
function addReview($link, $table, $name, $review){
    $sql = "insert into $table(user_name, review) values ('%s', '%s')";
    $sqlSprint = sprintf($sql, mysqli_real_escape_string($link, $name), mysqli_real_escape_string($link, $review));
    $query = mysqli_query($link, $sqlSprint);
    if(!$query){
        die(mysqli_error($link));
    }
    return true;
}
   
function loginCheck($link, $table, $login){
    $sql = "select id from $table where login = '$login'";
    $query = mysqli_query($link, $sql);
    return $row = mysqli_fetch_assoc($query);
}

function saveData($link, $table, $login, $pass){
    $sql = "insert into $table(login, pass) values ('%s', '%s')";
    $sqlSprint = sprintf($sql, mysqli_real_escape_string($link, $login), mysqli_real_escape_string($link, $pass));
    $query = mysqli_query($link, $sqlSprint);
    if(!$query){
        die(mysqli_error($link));
    }
    return true;
}

function checkLoginAndPass($link, $table, $login, $pass){
    $sql = "select id from $table where login = '$login' and pass = '$pass'";
    $query = mysqli_query($link, $sql);
    return mysqli_num_rows($query);
}

function checkGoods($link, $table, $sessId, $goodId){
    $sql = "select * from $table where sessId = '$sessId' and goodId = '$goodId'";
    $query = mysqli_query($link, $sql);
    return mysqli_num_rows($query);
}

function cartUpdate($link, $table, $sessId, $goodId){
    $sql = "update $table set count = count + 1 where sessId = '$sessId' and goodId = '$goodId'";
    $query = mysqli_query($link, $sql);
    return true;
}

function cartInsert($link, $table, $sessId, $goodId){
    $sql = "insert into $table (goodId, sessId, count ) values ('%s', '%s', '%s') ";
    $sqlSprint = sprintf($sql, mysqli_real_escape_string($link, $goodId), 
        mysqli_real_escape_string($link, $sessId), mysqli_real_escape_string($link, '1'));
    $query = mysqli_query($link, $sqlSprint);
    if(!$query){
        die(mysqli_error($link));
    }
    return true;
}

function actionCart($link, $action, $table, $sessId){
    $sql = "$action from $table where sessId = '$sessId'";
    return $query = mysqli_query($link, $sql);
}

function checkoutOrder($link, $table, $customerName, $customerNumber, $customerText, $items, $sum){
    $sql = "insert into $table (customerName, customerNumber, customerText, items, price) values('%s', '%s', '%s', '%s', '%s')";
    $sqlSprint = sprintf($sql, mysqli_real_escape_string($link, $customerName), mysqli_real_escape_string($link, $customerNumber), 
        mysqli_real_escape_string($link, $customerText), mysqli_real_escape_string($link, $items), 
            mysqli_real_escape_string($link, $sum));
    $query = mysqli_query($link, $sqlSprint);
    if(!$query){
        die(mysqli_error($link));
    }
    return true;
}

function customerOrders($link, $table, $customerName){
    $sql = "select * from $table where customerName = '$customerName'";
    $query = mysqli_query($link, $sql);
    $res = [];
    while($row = mysqli_fetch_assoc($query)){
        $res[] = $row;
    }
    return $res;
}

function getMostPopular($link, $table){
    $sql="select max(views) as views, title, img, price, part_description, id from $table group by views desc";
    $query = mysqli_query($link, $sql);
    return $row = mysqli_fetch_assoc($query);
}

function getLowPrice($link, $table){
    $sql="select min(price) as price, title, img, part_description, id from $table group by price asc";
    $query = mysqli_query($link, $sql);
    return $row = mysqli_fetch_assoc($query);
}

function deleteOneGood($link, $table, $id){
    $sql = "delete from $table where id = $id";
    return mysqli_query($link, $sql);
}

function editGood($link, $table, $title, $img, $price, $full_description, $part_description, $id){
    $sql = "update $table set title = '$title', price = '$price', full_description = '$full_description',
        part_description = '$part_description', img = '$img' where id = '$id' ";
    return $query = mysqli_query($link, $sql);
}

function addNewGood($link, $table, $title, $img, $price, $partDescription, $fullDescription){
    $sql = "insert into $table(title, img, price, part_description, full_description) values('%s', '%s', '%s', '%s', '%s')";
    $sqlSprint = sprintf($sql, mysqli_real_escape_string($link, $title), mysqli_real_escape_string($link, "images/".$img), 
        mysqli_real_escape_string($link, $price), mysqli_real_escape_string($link, $partDescription), 
            mysqli_real_escape_string($link, $fullDescription));
    $query = mysqli_query($link, $sqlSprint);
    if(!$query){
        die(mysqli_error($link));
    }
    return true;
}

function acceptOrder($link, $table, $id){
    $sql = "update $table set orderState = '1' where id = '$id'";
    return $query = mysqli_query($link, $sql);
}


function isAdmin($link, $table){
    $sql = "select * from $table where value = '1' ";
    $query = mysqli_query($link, $sql);
    return $row = mysqli_fetch_assoc($query);
}