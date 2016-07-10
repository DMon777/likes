<?php
session_start();
require_once "autoload.php";
require_once "config.php";
$object = Route_Controller::instance();
$object->route();
?>