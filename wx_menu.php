<?php
//迎贵运微信公众平台菜单
$appid = "wxa251e8ab191d3bbb";
$appsecret = "9850d230e0677725726b9ae3734df532";
$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";

$output = https_request($url);
$jsoninfo = json_decode($output, true);
$access_token = $jsoninfo["access_token"];

$jsonmenu = '{
      "button":[
      {
            "name":"微商城",
           	"sub_button":[
            {
            		"type":"view",
                "name":"逛逛商城",
                "url":"http://ygy.yz360.net/wechat/oauth/wxch_oauth.php?oid=17"
            },
            {
               "type":"click",
               "name":"招商加盟",
               "key":"招商加盟"
            },
            {
               "type":"view",
               "name":"骆驼抽奖",
               "url":"http://ygy.yz360.net/mobile/article.php?id=49"
            },
            {
               "type":"view",
               "name":"会员中心",
               "url":"http://ygy.yz360.net/mobile/user.php"
            },
            {
                "name": "附近店铺", 
		            "type": "location_select", 
		            "key": "rselfmenu_2_0"
            }]
      

       },
       {
       		"name":"品牌推荐",
       		 "sub_button":[{
       		 		"type":"click",
              "name":"白酒专区",
              "key":"白酒专区"
       		 },
       		 {
       		 		"type":"click",
              "name":"红酒专区",
              "key":"红酒专区"
       		 },
       		 {
       		 		"type":"click",
              "name":"饮料专区",
              "key":"饮料专区"
       		 },
       		 {
       		 		"type":"click",
              "name":"品牌上新",
              "key":"new"
       		 },
       		 {
       		 		"type":"click",
              "name":"促销有礼",
              "key":"促销有礼"
       		 }]
       },
       {
            "name":"关于我们",
           "sub_button":[
            {
          		"name": "公司官网", 
	            "type": "view", 
	            "url": "http://ygy.yz360.net/mobile/article.php?id=52"
            },
            {
               "type":"view",
               "name":"公司客服",
               "url":"http://ygy.yz360.net/mobile/article.php?id=51"
            },
            {
               "type":"view",
               "name":"公司文化",
               "url":"http://ygy.yz360.net/mobile/article.php?id=50"
            },
            {
               "type":"click",
               "name":"公司资讯",
               "key":"公司资讯"
            },
            {
                "type":"click",
                "name":"注册有礼",
                "key":"注册有礼"
            }]
      

       }]
 }';

$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
$result = https_request($url, $jsonmenu);
var_dump($result);

function https_request($url,$data = null){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}

?>