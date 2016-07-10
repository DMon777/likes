<?php

class Logout_Controller extends Base_Controller
{

    protected function input($params = array()){
        parent::input();

        $this->logout();
    }

    protected function logout(){
        unset($_SESSION['auth']['user']);
        header("Location:".$_SERVER['HTTP_REFERER']);
    }



}