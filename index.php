<?php
$file = fopen("test.txt", "w");
fwrite($file, "Привет, мир!");
fclose($file);

$file = fopen("test.txt", "r");
$content = fread($file, filesize("test.txt"));
echo $content . "<br>";
fclose($file);

rename("test.txt", "mir.txt");

if(!file_exists("folder")){
    mkdir("folder");
}

rename("mir.txt", "folder/mir.txt");

copy("folder/mir.txt", "folder/world.txt");

$size = filesize("folder/world.txt");
echo $size . " байт<br>";
echo $size / 1048576 . " МБ<br>";
echo $size / 1073741824 . " ГБ<br>";

unlink("folder/world.txt");

if(file_exists("folder/world.txt")){
    echo "world.txt существует<br>";
} else {
    echo "world.txt не существует<br>";
}

if(file_exists("folder/mir.txt")){
    echo "mir.txt существует<br>";
} else {
    echo "mir.txt не существует<br>";
}
?>
