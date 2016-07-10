<?php


class Registration_Controller extends Base_Controller {


    protected function input($params = array()){
        parent::input();

        if($_POST['reg']){
            $result =  User_Model::instance()->registration($_POST['login'],$_POST['password'],$_POST['mail']);
            if($result){
                $_SESSION['reg']['result'] = "Спасибо за регистрацию!!!";
            }
            else{
                $_SESSION['reg']['result'] = "Произошла ошибка!!!";
            }
        }
    }

    protected function output(){

        $this->content = $this->render(array(),'blocks/registration_content');

        $this->page = parent::output();
    }

} 


?>