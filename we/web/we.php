<?php
/**
 * wechat php test
 */

//define your token
<<<<<<< HEAD

define("TOKEN", $token);
//define("ID",$ids);
define("APPID", $appid);
define("APPSECRET", $appsecret);

=======
define("TOKEN", $token);
define("ID",$ids);
>>>>>>> 2a232ea7802fc63b3f244e07235e559aff1ebe00
$wechatObj = new wechatCallbackapiTest();
$wechatObj->valid();
class wechatCallbackapiTest
{
    public function valid()
    {
        $echoStr = $_GET["echostr"];
        //valid signature , option
        if($this->checkSignature()){
            echo $echoStr;
            //echo $id;
            $this->responseMsg();
            exit;
        }
    }

    private function getAccesstoken(){
        /*
        $redis = new redis();
        $result = $redis->pconnect('127.0.0.1',"6379");
        $access_token = $redis->get("1408f_weixinaccesstoken");
        if($access_token){
            return $access_token;
        }else{
            $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".APPID."&secret=".APPSECRET;
            $json=file_get_contents($url);
            $arr=json_decode($json,true);
            $redis->setex("1408f_weixinaccesstoken",7000,$arr['access_token']);
            return $arr['access_token'];
        }
        */
        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
        $json=file_get_contents($url);
        $arr=json_decode($json,true);
        return $arr['access_token'];

    }

    public function createMenu(){
        $accessToken=$this->getAccesstoken();

        $url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$accessToken;
        $data='{
			 "button":[
			 {
				  "type":"click",
				  "name":"1408e",
				  "key":"V1001_TODAY_MUSIC"
			  },
			  {
				   "name":"呵呵",
				   "sub_button":[
				   {
					   "type":"view",
					   "name":"哈哈",
					   "url":"https://www.baidu.com/"
					},
					{
					   "type":"view",
					   "name":"哼哼",
					   "url":"http://v.qq.com/"
					},
					{
					   "type":"click",
					   "name":"咻咻",
					   "key":"V1001_GOOD"
					}]
			   }]
		 }';
        $json=$this->curlPost($url,$data,'POST');
        return $json;
    }

    public function responseMsg()
    {
        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        //extract post data
        if (!empty($postStr)){
            /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
               the best way is to check the validity of xml by yourself */
            libxml_disable_entity_loader(true);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
<<<<<<< HEAD
							</xml>";
            if(!empty( $keyword ))
            {
                $url="http://www.tuling123.com/openapi/api?key=a55518f848f756fdc5560533c3fa43a2&info=".urlencode($keyword);
                $html=file_get_contents($url);
                //echo $html;
                $arr=json_decode($html,true);
                $msgType = "text";
                $contentStr =  $arr['text'];
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;

            }else{
                echo "Input something...";
            }
=======
							</xml>";             
				if(!empty( $keyword ))
                {
                    $pdo=new PDO("mysql:host=w.rdc.sae.sina.com.cn;port=3307;dbname=app_summerve","x323kkzz3o","00201j3k2iwkkim1yjj3kzkii3zkziy1k25ly51y",array(PDO::MYSQL_ATTR_INIT_COMMAND=>'set names utf8'));
                    $re=$pdo->query("select message_content from message where message_this='$keyword' and number_id= ".ID)->fetchAll();
                    $msgType = "text";
                    $contentStr = $re[0]["message_content"];
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;
                }else{
                	echo "Input something...";
                }
>>>>>>> 2a232ea7802fc63b3f244e07235e559aff1ebe00

        }else {
            echo "";
            exit;
        }
    }

    private function checkSignature()
    {
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }

        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
}

?>
