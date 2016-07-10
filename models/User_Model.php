<?php 

class User_Model{

	protected static $instance;
	protected static $db;

	public static function instance(){
        if(self::$instance instanceof self) {
            return self::$instance;
        }
        return self::$instance = new self;
    }

	protected function __construct(){
        self::$db = Database_Model::instance();
    }

    public function registration($login,$password,$mail){
        return self::$db->insert('users',array('login','password','mail'),array($login,$password,$mail));
    }

    public function auth($login,$password){
        $sql = "SELECT * FROM users WHERE login='$login' AND password='$password'";
        $result = self::$db->select($sql);
        if($result){
            $_SESSION['auth']['user'] = $login;
            return true;
        }
        else{
            return false;
        }
    }

    public function is_auth(){
        if(isset($_SESSION['auth']['user'])){
            return true;
        }
        return false;
    }


}



?>