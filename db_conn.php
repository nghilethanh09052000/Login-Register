<?php
$severName=".\MSSQL_EXP_2008R2";
$Database='User';
$UID="sa";
$PWD="abcABC@123";
$connectionInfo=array("Database"=>$Database,
"UID"=>$UID,"PWD"=>$PWD);
$conn=sqlsrv_connect($severName,$connectionInfo);

if (!$conn) {
	echo "Connection failed!";
}