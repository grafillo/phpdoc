<?php


$connect = mysqli_connect("localhost", "root", "", "testovoe");

$sql = "SELECT users.id,users.name, groups_tb.name AS name_group FROM groups_tb INNER JOIN users ON users.group = groups_tb.id 
      WHERE groups_tb.id ='1'";


//$sql = "SELECT name AS name_group FROM groups_tb
//      WHERE groups_tb.id ='1'";


$result = mysqli_query($connect, $sql);
$result = mysqli_fetch_all($result, MYSQLI_ASSOC);

print_r($result);


