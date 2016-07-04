<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class MenuController extends Controller{
    public $layout='nav2.php';
	public $enableCsrfValidation = false;

	Public function actionIndex(){
		return $this->render("form");
	}

	Public function actionAdds(){
		$request=Yii::$app->request;
		$m_name=$request->post("m_name");
		$m_pid=$request->post("m_pid");
		//echo $m_name;die;
		$connection=Yii::$app->db;

		$connection->createCommand()->insert('menus',[
			'm_name'=>$m_name,
			'm_pid'=>$m_pid
		])->execute();

		//echo $sql;die;
		return $this->redirect("index.php?r=menu/menus");
	}

	Public function actionMenus(){
		
	}


}