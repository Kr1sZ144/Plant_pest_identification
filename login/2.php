<?php

header("Content-type:text/html;charset=utf-8");  

$user = $_POST["userName"];//接受收username
$pwd = $_POST["pwd"];//接受密码
// $nickName= $_POST["nickName"];
$link = mysqli_connect("localhost", "admin", "admin11", "kinoko1824");//连接数据库
mysqli_set_charset($link,"utf8");//设置字符集编码
$sql = "insert user(userName,pwd,nickName) values('$user','$pwd','$nickName')";//拼接sql语句
$result = mysqli_query($link,$sql);//执行语句
$rows =  mysqli_affected_rows($link);
if($rows > 0){
	  	
    echo "1";
 }else{
      echo "炸了";
 }