<?php

header("Cache-Control:no-cache, must-revalidate");//HTTP/1.1
header("Pragma:no-cache");

// DB 연결
$dbConn	= mysqli_connect("localhost", "huny10000","dlwlgns71008986!","huny10000");

// 한글깨짐 처리
mysqli_query($dbConn, "set session character_set_connection=utf8;");
mysqli_query($dbConn, "set session character_set_results=utf8;");
mysqli_query($dbConn, "set session character_set_client=utf8;");

?>
