<?php
class Ajax_Controller extends Base_Controller
{
    protected function input($params = array())
    {
        parent::input();
            $this->add_new_like($_POST['article_id']);
    }


    public function add_new_like($article_id){
        if(User_Model::instance()->is_auth()) {
            Model::instance()->add_like($article_id);
        }
        echo Model::instance()->count_likes($article_id);
    }








}