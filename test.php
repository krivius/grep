<?php
require_once 'grep.php';


$test = grep('C:\\Projects\\TEST\\test.txt', 'quam rhon');
foreach ($test as $item){
    echo $item;
    echo "\n";
}
$test2 = grep('C:\\Projects\\TEST\\test.txt', '49298985314bf497ae4a5b7722b7af97', 'h');
echo $test2;