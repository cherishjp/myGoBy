<?php  
ignore_user_abort();
set_time_limit(0);   
//ob_start();
//ob_end_flush(1);

$start_msg = "启动任务计划\r\n";
echo date("Y-m-d H:i:s").iconv('UTF-8','GB2312',$start_msg);

require_once('api_run_class.php');
$php = new console;

$data['filePath']='./img/default_face.jpg';
$data['fileid']='images/public/default_face.jpg';
$data['service']='Test.uploadToQcloud';
$php->httpApi('',$data);
/*
for($i=900000001;$i<900003975;$i++)
{
	$data=array(
		'service' => 'Test.addGold',
		'uid'	=>	$i,
		'gold'	=>	888888888
	);
	$php->httpApi('',$data);
}
*/
exit;
$interval_second = 5;  

do{  
	//测试实例
	$php->log('3600',time());
	sleep($interval_second);
}while(true);

?>
