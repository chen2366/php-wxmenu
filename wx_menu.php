<?php
//ӭ����΢�Ź���ƽ̨�˵�
$appid = "wxa251e8ab191d3bbb";
$appsecret = "9850d230e0677725726b9ae3734df532";
$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";

$output = https_request($url);
$jsoninfo = json_decode($output, true);
$access_token = $jsoninfo["access_token"];

$jsonmenu = '{
      "button":[
      {
            "name":"΢�̳�",
           	"sub_button":[
            {
            		"type":"view",
                "name":"����̳�",
                "url":"http://ygy.yz360.net/wechat/oauth/wxch_oauth.php?oid=17"
            },
            {
               "type":"click",
               "name":"���̼���",
               "key":"���̼���"
            },
            {
               "type":"view",
               "name":"���ճ齱",
               "url":"http://ygy.yz360.net/mobile/article.php?id=49"
            },
            {
               "type":"view",
               "name":"��Ա����",
               "url":"http://ygy.yz360.net/mobile/user.php"
            },
            {
                "name": "��������", 
		            "type": "location_select", 
		            "key": "rselfmenu_2_0"
            }]
      

       },
       {
       		"name":"Ʒ���Ƽ�",
       		 "sub_button":[{
       		 		"type":"click",
              "name":"�׾�ר��",
              "key":"�׾�ר��"
       		 },
       		 {
       		 		"type":"click",
              "name":"���ר��",
              "key":"���ר��"
       		 },
       		 {
       		 		"type":"click",
              "name":"����ר��",
              "key":"����ר��"
       		 },
       		 {
       		 		"type":"click",
              "name":"Ʒ������",
              "key":"new"
       		 },
       		 {
       		 		"type":"click",
              "name":"��������",
              "key":"��������"
       		 }]
       },
       {
            "name":"��������",
           "sub_button":[
            {
          		"name": "��˾����", 
	            "type": "view", 
	            "url": "http://ygy.yz360.net/mobile/article.php?id=52"
            },
            {
               "type":"view",
               "name":"��˾�ͷ�",
               "url":"http://ygy.yz360.net/mobile/article.php?id=51"
            },
            {
               "type":"view",
               "name":"��˾�Ļ�",
               "url":"http://ygy.yz360.net/mobile/article.php?id=50"
            },
            {
               "type":"click",
               "name":"��˾��Ѷ",
               "key":"��˾��Ѷ"
            },
            {
                "type":"click",
                "name":"ע������",
                "key":"ע������"
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