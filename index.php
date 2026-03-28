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

if(!file_exists("test")){
    mkdir("test");
    echo "Папка 'test' создана<br>";
}

rename("test", "www");
echo "Папка 'test' переименована в 'www'<br>";

rmdir("www");
echo "Папка 'www' удалена<br>";

if(!file_exists("test")){
    mkdir("test");
    echo "Папка 'test' создана заново<br>";
}

$arr = ["folder1", "folder2", "folder3"];
foreach($arr as $folder){
    if(!file_exists("test/" . $folder)){
        mkdir("test/" . $folder);
        echo "Папка 'test/$folder' создана<br>";
    }
}

$jpgFiles = ["image1.jpg", "photo2.jpg", "picture3.jpg", "document.txt", "style.css"];
foreach($jpgFiles as $file){
    $handle = fopen($file, "w");
    fwrite($handle, "Тестовое содержимое файла $file");
    fclose($handle);
    echo "Файл '$file' создан<br>";
}

echo "Файлы с расширением jpg из текущей папки:<br>";
foreach(glob("*.jpg") as $file){
    echo basename($file) . "<br>";
}
?>
