<?php 

require_once('strMagicFunc.php');

echo 'enter string:'; 
$input = fgets(STDIN);

$Magic = new Magic($input);
echo $Magic->magic();