<?php

$db = mysqli_connect("localhost", "testBase", "AiYrbaUrdDme6V6l", "mybd") or die('Ошибка соединения с БД');
if(!$db) die(mysqli_connect_error());
mysqli_set_charset($db, "utf8");

?>
