<?php
namespace app\controllers;
class WeiController extends \yii\web\Controller{
    public $enableCsrfValidation = false;
    public function actionUrl(){
        $sel=$_GET['st'];
        $connection = \Yii::$app->db;
        $command = $connection->createCommand("SELECT we_token FROM numbers WHERE we_st='$sel'");
        $post = $command->queryOne();
        $token=$post['we_token'];
        include_once('we.php');
    }
}