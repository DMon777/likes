<?php


class Article_Controller extends Base_Controller
{

    protected $article;
    protected $count_likes;

    protected function input($params = array()){
        parent::input();

        $this->scripts = array('jQuery','test2');

        $this->article = Model::instance()->get_article($params['id']);

        $this->count_likes = Model::instance()->count_likes($params['id']);
    }

    protected function output(){

        $this->content = $this->render(array('article' => $this->article,'count_likes'=>$this->count_likes),
            'blocks/article_content');

        $this->page = parent::output();
    }


}