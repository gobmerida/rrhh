<?php  

	header("Content-Type:text/html;charset=utf-8");
    $h="localhost";
    $u="adminrrhh";
    $p="LK8AfutPLxPhhmCO";
    $con=mysql_connect($h,$u,$p) or die (mysql_error());
    mysql_select_db("bd_rrhh",$con) or die (mysql_error());
    mysql_query("SET NAMES 'utf8'");
    

?>