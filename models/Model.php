<?php


class Model{

	protected static $instance;
	protected static $database_object;

	public static function instance(){
        if(self::$instance instanceof self) {
            return self::$instance;
        }
        return self::$instance = new self;
    }

    protected function __construct(){
    	self::$database_object = Database_Model::instance();
    }

    public static function get_all_articles(){
    	$sql = "SELECT * FROM articles";
    	$result = self::$database_object->select($sql);
    	return $result;
    }

    public static function get_article($article_id){
        $sql = "SELECT * FROM articles WHERE id='$article_id'";
        $result = self::$database_object->select($sql);
        return $result[0];
    }

    public function add_like($article_id){
        $sql = "SELECT * FROM likes WHERE article_id=$article_id";
        $res = self::$database_object->select($sql);
        if($res){
            $count_likes = $this->count_likes($article_id);

            $likers = $this->get_likers($article_id);


            foreach($likers as $key => $val){
                if($val['user_login'] == $_SESSION['auth']['user']){
                    $this->delete_like($_SESSION['auth']['user'],$article_id);
                    return false;
                }
            }

            if($count_likes){
                self::$database_object->update('likes',array('count_likes'),array($count_likes+1),array('article_id'=>$article_id));

                $sql = "SELECT like_id FROM likes WHERE article_id=$article_id";
                $result = self::$database_object->select($sql);
                $like_id1 = $result[0]['like_id'];

                $this->add_liker($like_id1,$_SESSION['auth']['user'],$article_id);
            }
        }

        else{
            self::$database_object->insert('likes',array('article_id','count_likes'),array($article_id,1));
            $like_id = self::$database_object->last_id();
            $this->add_liker($like_id,$_SESSION['auth']['user'],$article_id);
        }
    }


    protected function get_likers($article_id){
        $sql = "SELECT user_login FROM likers  LEFT JOIN likes ON likes.like_id=likers.id_like WHERE article_id='$article_id'";
        return self::$database_object->select($sql);
    }

    protected function add_liker($like_id,$user_login,$article_id){
        self::$database_object->insert('likers',array('id_like','user_login','id_article'),array($like_id,$user_login,$article_id));
    }

    public function count_likes($article_id){
        $sql = "SELECT count_likes FROM likes WHERE article_id=$article_id";
        $res = self::$database_object->select($sql);
        if($res['0']['count_likes'] == 0){
            $sql = "DELETE FROM likes WHERE article_id=$article_id";
            self::$database_object->query($sql);
            return;
        }
        return $res[0]['count_likes'];
    }


    protected function delete_like($user_login,$article_id){
        $sql = "DELETE FROM likers WHERE user_login='$user_login' AND id_article=$article_id";
        self::$database_object->query($sql);
        $count_likes = $this->count_likes($article_id);
        $count_likes -= 1;
        self::$database_object->update('likes',array('count_likes'),array($count_likes),array('article_id'=>$article_id));
    }

}


?>