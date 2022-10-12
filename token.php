<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_SSL_VERIFYPEER => false,//禁止 cURL 验证对等证书
  CURLOPT_SSL_VERIFYHOST => false,//不检查证书
  CURLOPT_URL => "https://iam.myhuaweicloud.com/v3/auth/tokens?nocatalog=true",//这是你想用PHP取回的URL地址
  CURLOPT_RETURNTRANSFER => true,//设定是否显示头信息
  CURLOPT_ENCODING => "",//表示支持所有的编码格式
  CURLOPT_MAXREDIRS => 10,//限定递归返回的数量
  CURLOPT_TIMEOUT => 30,//设置一个长整形数，作为最大延续30秒
  CURLINFO_HEADER_OUT => true,//发送请求的字符串
  CURLOPT_HEADER => 1,//如果你想把一个头包含在输出中，设置这个选项为一个非零值
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,//设置curl使用的HTTP协议
  CURLOPT_CUSTOMREQUEST => "POST",//当进行HTTP请求时，传递一个字符被post使用
 //传递一个作为HTTP “POST”操作的所有数据的字符串 ↓ ↓
  CURLOPT_POSTFIELDS => '{ 
    "auth": {
        "identity": {
            "methods": [
                "password"
            ],
            "password": {
                "user": {
                    "domain": {
                        "name": "Kr1sWin"
                    },
                    "name": "Kr1sWin",
                    "password": "skekletonZCS520"
                }
            }
        },
        "scope": {
            "project": {
                "name": "cn-north-4"
            }
        }
    }
}',
  CURLOPT_HTTPHEADER => array( //设置一个header中传输内容的数组
    "Content-Type: application/x-www-form-urlencoded",
    "Postman-Token: c5a22729-d2a9-45b3-a437-be11d8cc9413",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $array = explode(":", $response);
  // print_r($array);

  $token = str_replace("X-Request-Id", "", $array[13]);
  echo $token;
}