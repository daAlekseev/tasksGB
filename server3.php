<?php

// Пути загрузки файлов
$path = 'formSmall/';
$tmp_path = 'tmp/';
// Массив допустимых значений типа файла
$types = array('image/gif', 'image/png', 'image/jpeg');
// Максимальный размер файла
$size = 1024000;
 
// Обработка запроса
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
 // Проверяем тип файла
 if (!in_array($_FILES['picture']['type'], $types))
 die('<p>Запрещённый тип файла. <a href="?">Попробовать другой файл?</a></p>');
 
 // Проверяем размер файла
 if ($_FILES['picture']['size'] > $size)
 die('<p>Слишком большой размер файла. <a href="?">Попробовать другой файл?</a></p>');
 
 // Функция изменения размера
 // Изменяет размер изображения в зависимости от type:

 function resize($file){
    global $tmp_path;

    $image1 = $_FILES['picture']['name'];
    $path1 = "formBig/".$image1;

    if(copy($_FILES['picture']['tmp_name'], $path1)){

    }

    // Ограничение по ширине в пикселях
    $max_thumb_size = 200;

    // Cоздаём исходное изображение на основе исходного файла
    if ($file['type'] == 'image/jpeg')
        $source = imagecreatefromjpeg($file['tmp_name']);
    elseif ($file['type'] == 'image/png')
        $source = imagecreatefrompng($file['tmp_name']);
    elseif ($file['type'] == 'image/gif')
        $source = imagecreatefromgif($file['tmp_name']);
    else
        return false;
    
    $src = $source;
 
    // Определяем ширину и высоту изображения
    $w_src = imagesx($src); 
    $h_src = imagesy($src);
    
    $w = $max_thumb_size;
    
    // Если ширина больше заданной
    if ($w_src > $w){
        // Вычисление пропорций
        $ratio = $w_src/$w;
        $w_dest = round($w_src/$ratio);
        $h_dest = round($h_src/$ratio);
 
        // Создаём пустую картинку
        $dest = imagecreatetruecolor($w_dest, $h_dest);
 
        // Копируем старое изображение в новое с изменением параметров
        imagecopyresampled($dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);
 
        // Вывод картинки и очистка памяти
        imagejpeg($dest, $tmp_path . $file['name']);
        imagedestroy($dest);
        imagedestroy($src);
 
        return $file['name'];
    }
    else
    {
    // Вывод картинки и очистка памяти
    imagejpeg($src, $tmp_path . $file['name']);
    imagedestroy($src);
 
    return $file['name'];
    }
    }
 
    $name = resize($_FILES['picture']);
 
    // Загрузка файла и вывод сообщения
    if (copy($tmp_path . $name, $path . $name)){
        $images = scandir("formSmall");
        for($i = 2; $i < count($images); $i++){
            echo " <a href=\"server4.php?path=$i\"><img src = \"formSmall/$images[$i]\"></a> ";
        }
        // echo '<a href="' .$path .$_FILES['picture']['name'] .'">Картинка</a>';
    }
    // Удаляем временный файл
    unlink($tmp_path . $name);
    }
 
?>

