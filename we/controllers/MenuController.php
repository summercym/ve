<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;

class MenuController extends Controller{
    public $layout='nav2.php';
	public $enableCsrfValidation = false;
    public function actionIndex(){
        $request = Yii::$app->request->method;
        $requests = Yii::$app->request;
        $connection = \Yii::$app->db;
        //调用session
        $session = Yii::$app->session;
        $session->open();
        if($request!="POST"){
            return $this->render('form');
        }else{
            $m_name=$requests->post('m_name');
            $m_pid=$requests->post('m_pid');
            $number_id=$session->get('number_id');
            //echo $number_id;die;
            $arr = $connection->createCommand()->insert('menus', [
                'm_name' => $m_name,
                'm_pid' => $m_pid,
                'number_id'=>$number_id,
            ])->execute();
            if($arr){
                $this->redirect("index.php?r=menu/show");
            }
        }
    }
    public function actionShow(){
        $connection = \Yii::$app->db;
        $command ['list'] =  $connection->createCommand("select * from menus")->queryAll();
        return $this->render('show',$command );
    }
//删除
    public function actionDel(){
        $request = Yii::$app->request;
        $connection = \Yii::$app->db;
        $id =  $request->get("id");
        $connection->createCommand()->delete('menus', ['m_id'=>$id])->execute();
        return $this->redirect("index.php?r=menu/show");
    }
 //修改
    public function actionUp(){
        $request = Yii::$app->request;
        $connection = \Yii::$app->db;
        $id =  $request->get("id");
        //echo $id;die;
        $re=$connection->createCommand("SELECT * FROM menus WHERE m_id=$id")->queryOne();
        //print_r($re);die;
        return $this->render("inserts",['arr'=>$re]);
    }

    public function actionUpdate(){
        $request = Yii::$app->request;
        $connection = \Yii::$app->db;
        $m_name=$request->post('m_name');
        $id=$request->post('id');
        $connection->createCommand()->update('menus', ['m_name'=>$m_name],['m_id'=>$id])->execute();
        return $this->redirect("index.php?r=menu/show");
    }



}