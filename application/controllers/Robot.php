<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Robot extends CI_Controller {
          
    function __construct(){  
        parent::__construct();  
    } 

    public function autoput(){
        $data = array('tid'=>'10', 'content'=>'博主赶紧出来发红包!');
        $data = http_build_query($data);
        $opts = array(
            "http"=>array(
                'method'=>"POST",
                'header'=>
                    "Content-Type:application/x-www-form-urlencoded; charset=UTF-8"."\r\n".
                    "Content-Length:".strlen($data)."\r\n".
                    "Cookie:PHPSESSID=d9d77da10eb2b354eb035491a98f1484; talkpiece_uid=2e94mFVib3v6Y0je7Ru%2F4WaMoX%2B4LmJSHVp7Ri%2B0"."\r\n".
                    "User-Agent:Mozilla/5.0 (Windows NT 10.0; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0"."\r\n".
                    "Referer:http://bbs.kjifen.com/index.php?m=topic&a=detail&tid=10"."\r\n",
                'content'=>$data
            )
        );
        $context = stream_context_create($opts);
        $file = @file_get_contents("http://bbs.kjifen.com/index.php?m=topic&a=detail&tid=10", false, $context);
        echo $file;
    }

    public function autoput2(){
        $uri = "http://bbs.kjifen.com/index.php?m=topic&a=reply";
        // 参数数组
        $cookie_jar = dirname(__FILE__)."\my.cookie";
        $data = array('tid'=>'10', 'content'=>'想要积分就来积分网，积分网，专业的积分网!');
        $ch = curl_init ();
        // print_r($ch);
        curl_setopt ( $ch, CURLOPT_URL, $uri );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
        //curl_setopt ( $ch, CURLOPT_COOKIE, "PHPSESSID=d9d77da10eb2b354eb035491a98f1484");
        curl_setopt ( $ch, CURLOPT_COOKIEFILE, $cookie_jar);
        $return = curl_exec ( $ch );
        curl_close ( $ch );
        $file = file_get_contents("http://bbs.kjifen.com/index.php?m=topic&a=detail&tid=10");
        echo $file;
    }

    public function getcookie(){
        $url = "http://bbs.kjifen.com/index.php?m=user&a=login";
        $cookie_jar = dirname(__FILE__)."\my.cookie";
        $data = array('email'=>'1903913942@qq.com', 'password'=>'liu19921016');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_jar);
        $content = curl_exec($ch);
        curl_close($ch);
    }

    public function show(){
        phpinfo();
    }
}
