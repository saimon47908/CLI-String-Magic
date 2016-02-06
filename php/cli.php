<?php 

require_once('Magic.php');

echo 'enter string:'; 
$input = fgets(STDIN);

$Magic = new Magic($input);
echo $Magic->magic();
