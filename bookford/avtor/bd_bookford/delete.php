<?php

require '../bread.php';
$bookford = new Database();

print_r($_POST['data_object']);

$name_delete_works = $_POST['name_delete_works'];
print_r($name_delete_works);
//$count = $bookford->execute("DELETE FROM `works` WHERE `name_works` LIKE '$name_delete_works'");
