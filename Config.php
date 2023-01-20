<?php
/*** mysql hostname ***/ $hostname = 'localhost';
/*** mysql username ***/ $username = 'root';
/*** mysql password ***/ $password = '';
/*** baza de date ***/ $db = 'shopping';
/*** se schimba port ***/ $port='3307';

/*** se creaza un obiect mysqli ***/
$conn = mysqli_connect($hostname, $username, $password,$db,$port);

?>