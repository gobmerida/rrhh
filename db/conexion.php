<?php  

	header("Content-Type:text/html;charset=utf-8");
    $h="localhost";
    $u="root";
    $p="infor1234";
    $con=mysql_connect($h,$u,$p) or die (mysql_error());
    mysql_select_db("PaginaMeridaGob_rrhh",$con) or die (mysql_error());
    mysql_query("SET NAMES 'utf8'");
    

?>