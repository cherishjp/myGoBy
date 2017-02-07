<?php   
/**
 * api 类
 * 2014/11/4 MR NIU
 */
class console
{
	public $sdk_key						= "68eb945028d5533b072c9d02bd3f4013616c888c";
	public $www							= "114.55.235.214";
	public $data_type					= "POST";
	public $api_url = array(
		'LiveA.startLive'			=>	"LiveA.startLive&test=2134&uid=900000000",
	);


	public function __construct()
	{

	}
	//初始化
	public function set_ini()
	{
		
	}
	/*get预设api*/
	public function getUrl($api)
	{
		return $this->api_url[$api];
	}
    /**
	 * 2014/11/4 MR NIU 记录接口日志
	 * @param   type    $msg	记录日志信息 $lv 日志记录登记（标记）
	 * @return  type    无返回
	 */
	public function log($msg,$data,$lv="LOG")
	{
		$a=filemtime("run.log");
		$update_date = date('Y-m-d',$a);
		
		//file_put_contents("run.log",$msg."\r\n",FILE_APPEND);
		if($fp = @fopen("run.log", "a+"))
		{
			$msg = "【".date("Y-m-d H:i:s")."】-<".$lv.">:".$msg."|".$data."\r\n";
			if($update_date != date("Y-m-d"))
			{
				$msg = "\r\n\r\n*********************************".date("Y-m-d")."***********************************\r\n".$msg;
			}
			echo iconv('UTF-8','GB2312',$msg)."\r\n";
			flock($fp,LOCK_EX);
			fwrite($fp,$msg);
			flock($fp,LOCK_UN);
			fclose($fp);
		}
		else
		{
		   echo "system error";
		}
	} // end func



	/**
	 * 获取远程返回数据 curl方式 2014/11/4 MR NIU
	 * @param   str    $file    api接口地址
	 * @return  str	   $msg		直接返回接口信息 
	 */
	public function get_data_by_curl($file)
	{
		$file .="&sdk_key=".$this->sdk_key;
		//echo $file."\r\n";
		$ch = curl_init($file) ;  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回  
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
		$msg = curl_exec($ch);
		$info = curl_getinfo($ch);
		
		$res = $msg."#总耗时：".$info['total_time']."秒#";
		return $res;
	} // end func

	 /**
     * curl post
     * @param unknown 
     * @param unknown 
     * @param unknown 
     * @author MR NIU
     * @datetime 2016-09-10 10:31:34
     */
    public function httpApi($api,$post_data=array(),$proxy = 0,$header=array())
    {
        $api_server = $this->www.$api;
		
        $ch = curl_init ( $api_server );

        curl_setopt ($ch, CURLOPT_CUSTOMREQUEST,$this->data_type);
        if(is_array($header) && !empty($header)){
            curl_setopt ($ch, CURLOPT_HEADER, 1); //设置header
            curl_setopt ($ch, CURLOPT_HTTPHEADER, $header);
        }
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $post_data); // $request=json
        if ($proxy) {
            //通过代理请求
            $API_CURLOPT_PROXY = "代理IP";
            curl_setopt ($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
            curl_setopt ($ch, CURLOPT_PROXY, $API_CURLOPT_PROXY);
        }
        $result = curl_exec($ch);
        $curl_errno = curl_errno($ch);
        $curl_info = curl_getinfo($ch);
        //$curl_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); // 获取http返回值
        curl_close ($ch);
  
        if ($curl_info['http_code'] == 200) {
			$this->log($api.'|耗时：'.$curl_info['total_time'].'秒',$result);
        } else {
            $this->log($api.'|耗时：'.$curl_info['total_time'].'秒',false);
        }

    }

} // end class
?>


012
013
023
123



012
013
014
023
024
034
123
124
134
234



