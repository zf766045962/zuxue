<?php
/* PHP SDK
 * @version 2.0.0
 * @author connect@qq.com
 * @copyright © 2013, Tencent Corporation. All rights reserved.
 */

require_once("ErrorCase.class.php");
class Recorder{
    private static $data;
    private $inc;
    private $error;

    public function __construct(){
        $this->error = new ErrorCase();

        //-------读取配置文件
        /*$incFileContents = '{"appid":"101225896","appkey":"af786d2372a8f39084f7febf1185c73c","callback":"http://xuer.com/Connect2.0/oauth/callback.php","scope":"get_user_info","errorReport":true,"storageType":"file","host":"","user":"","password":"","database":""}';*/
		
		$incFileContents = '{"appid":"'.QQ_APPID.'","appkey":"'.QQ_APPKEY.'","callback":"'.QQ_CALLBACK.'","scope":"'.QQ_SCOPE.'","errorReport":true,"storageType":"file","host":"","user":"","password":"","database":""}';
        $this->inc = json_decode($incFileContents);
        if(empty($this->inc)){
            $this->error->showError("20001");
        }

        if(empty($_SESSION['QC_userData'])){
            self::$data = array();
        }else{
            self::$data = $_SESSION['QC_userData'];
        }
    }

    public function write($name,$value){
        self::$data[$name] = $value;
    }

    public function read($name){
        if(empty(self::$data[$name])){
            return null;
        }else{
            return self::$data[$name];
        }
    }

    public function readInc($name){
        if(empty($this->inc->$name)){
            return null;
        }else{
            return $this->inc->$name;
        }
    }

    public function delete($name){
        unset(self::$data[$name]);
    }

    function __destruct(){
        $_SESSION['QC_userData'] = self::$data;
    }
}
