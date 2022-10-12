<?php

header("Content-type:text/html;charset=utf-8");  

$user = $_POST["userName"];//接受收username
$pwd = $_POST["pwd"];//接受密码
//数据库密码加密过
//$pwd = md5($pwd);//把接收的密码md5加密
$link = mysqli_connect("localhost", "admin", "admin11", "kinoko1824");//连接数据库
mysqli_set_charset($link,"utf8");//设置字符集编码
$sql =  "select * from user where userName='$user' and pwd='$pwd'";//拼接sql语句
$result = mysqli_query($link,$sql);//执行语句
if(is_object($result)){//判断是否为对象
$arr=mysqli_fetch_row($result);//一次解析一条
//释放结果集
 //mysqli_free_result($result);//登陆页面可要可不要
mysqli_close($link);//关闭数据库
}else {
    exit("sql语句拼写有误");//终止程序
}
if($arr){
    echo "1";//返回给前端

}else{
    echo "2";//同理
}