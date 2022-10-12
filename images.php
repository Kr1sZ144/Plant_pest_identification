<?php
//获取表单上传文件信息并赋值给变量
$arr=$_FILES['images'];
//获取文件名
$name=$arr['name'];
//取得文件格式名先用explode函数以点分割字符串再用array_pop（删除数组中的最后一个元素）弹出分割后数组内最后一个字符串获得格式名名
$exe=array_pop(explode(".",$name));
//设置上传后的文件名 mt_rand（给随机数发生器播种）
$file=time().mt_rand().'.'.$exe;
//获取默认存放到系统临时目录位置
$dir=$arr['tmp_name'];
//设置上传目录
$updir='uploads/'.$file;
//获取文件大小
$size=$arr['size'];
//设置允许上传文件大小
$maxsize=5000*10240;
//设置允许上传文件格式
$maxexe=array('jpg','png','JPG');
//连接数组中的字符串以逗号连接
$exename=join(',',$maxexe);
//获取错误编号0位正常1为超过PHP.INI中设置的最大上传大小限制4为上传文件为空
$error=$arr['error'];

if($arr){
	//判断文件错误码 错误编号0位正常1为超过PHP.INI中设置的最大上传大小限制4为上传文件为空
	if($error==0){
		//用in_array函数查看格式名是否在数组中
		if(in_array($exe,$maxexe)){
			//判断文件大小
			if($size<=$maxsize){
				//判断临时目录移动目标目录是否成功
				if(move_uploaded_file($dir,$updir)){
					echo $file;
				}
			}else{
				echo "只允许500KB文件大小上传";
			}
		}else{
			echo "只允许{$exename}格式上传";
		}
	}elseif($error==1){
		echo "文件大小超过PHP上传设置20M";
	}elseif($error==4){
		echo "请先选择上传文件";
	}
}else{
	echo "文件超过PHP设置表单POST上传最大限制100M";
}
