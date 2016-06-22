<?php
/**
 * wechat php test
 */

//define your token

define("TOKEN", $p_token);
//define("ID",$ids);
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
							</xml>";
            if(!empty( $keyword ))
            {
                //curl 模拟post请求
                //初始化curl
                $ch= curl_init();
                //设置curl请求
                $url="http://www.niurenqushi.com/app/simsimi/ajax.aspx";
                curl_setopt($ch,CURLOPT_URL,$url);
                //curl只返回结果 不输出
                curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                //curl 模拟post提交
                curl_setopt($ch,CURLOPT_POST,1);
                //定义发送的参数
                $data= array(
                    'txt'=>"$keywords"
                );
                //定义要发送的参数
                curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
                //执行curl
                $outpost=curl_exec($ch);
                //关闭curl
                curl_close($ch);
                $msgType = "text";
                $contentStr =$outpost;
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }else{
                echo "Input something...";
            }
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