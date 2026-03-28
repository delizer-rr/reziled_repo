<?php
try{
    $file = fopen("nonexistent_file.txt", "r");
    if($file === false){
        throw new Exception("Файл не существует");
    }
    fclose($file);
}catch(Exception $ex){
    echo $ex->getMessage() . "<br>";
    $log = fopen("log.txt", "a");
    fwrite($log, $ex->getMessage() . "\n");
    fclose($log);
}

try{
    $a = 10;
    $b = 0;
    if($b == 0){
        throw new Exception("Деление на ноль невозможно");
    }
    $result = $a / $b;
}catch(Exception $ex){
    echo $ex->getMessage() . "<br>";
    $log = fopen("log.txt", "a");
    fwrite($log, $ex->getMessage() . "\n");
    fclose($log);
}

try{
    $countries = ['Spain' => 'Madrid', 'Russia' => 'Moscow'];
    if(!array_key_exists('Germany', $countries)){
        throw new Exception("Элемент с ключом Germany не существует в массиве");
    }
    echo $countries['Germany'];
}catch(Exception $ex){
    echo $ex->getMessage() . "<br>";
    $log = fopen("log.txt", "a");
    fwrite($log, $ex->getMessage() . "\n");
    fclose($log);
}
?>
