<?php

function grep($filename, $string, $mode="r"){

    $config_yaml = yaml_parse_file('C:\\Projects\\TEST\\config.yaml'); //читаем файл конфигурации

    $config = [];
    foreach ($config_yaml as $item => $value){
        $config[$item] = $value;
    }

    $size = filesize($filename);
    $mime = mime_content_type($filename);

    if($size > $config["maxsize"]){
        return "The file is too large";
    }
    if($mime != $config["mimetype"]){
        return "Wrong file type";
    }

    if($mode == "r") { //поиск вхождения строки, по умолчанию

        $arr = file($filename);
        $result = [];

        foreach ($arr as $k => $v) {
            $offset = strpos($v, $string, 0);
            if ($offset !== false) {
                $result[] = $k . '-' . $offset;
            }
        }
        return $result;
    }elseif ($mode == "h"){ //сравнение md5-хэшей
        $hash = hash_file('md5', $filename);
        if($hash==$string){
            return '1';
        }
        return '-1';
    }
    //TODO: здесь можно добавить другие режимы работы функции
}


