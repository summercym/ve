<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Index;
class IndexController extends Controller{
    public $layout='nav2.php';
    public $enableCsrfValidation = false;
    public function actionIndex(){
        $model = new Index();
        $arr = "我是主页";
        return $this->render('index',['name'=>$arr]);
    }

    public function actionUp(){
        $connection = \Yii::$app->db;
        $co = $connection->createCommand("UPDATE sss set `name` = 'sel' where id=1")->execute();
        print_r($co);
    }
    public function actionSel(){
        header("content-type:text/html;charset=utf8");
        $connection = \Yii::$app->db;
        //$pr = $connection->createCommand()->insert('sss', ['name' => 'Sam'])->execute();
        $city = $_GET['city'];
        $type = isset($_GET['type'])?$_GET['type']:"";
        if($type=="xml"){
            $this->actionXml($city);die;
        }
        if($type=="jsonp"){
            $this->actionJsonp($city);die;
        }
        if($city!=""){
            $command = $connection->createCommand("SELECT * from ecs_region where region_name = '$city' ");
            $posts = $command->queryOne();
            if($posts){
                $parent_id = $posts['region_id'];
                $data = $connection->createCommand("SELECT * from ecs_region WHERE parent_id='$parent_id'");
                $cdr = $data->queryAll();
                if($cdr[0]['region_name']==$city){
                    $parent_id = $cdr[0]['region_id'];
                    $data = $connection->createCommand("SELECT * from ecs_region WHERE parent_id='$parent_id'");
                    $cdr = $data->queryAll();
                }
                header('Content-type: application/json');
                echo json_encode($cdr);
            }else{
                $this->error();
            }
        }else{
            $this->error();
        }
    }
    public function actionXml($city){
		ob_clean();
        header("content-type:text/html;charset=utf8");
        $connection = \Yii::$app->db;
        if($city!=""){
            $command = $connection->createCommand("SELECT * from ecs_region where region_name = '$city' ");
            $posts = $command->queryOne();
            if($posts){
                $parent_id = $posts['region_id'];
                $data = $connection->createCommand("SELECT * from ecs_region WHERE parent_id='$parent_id'");
                $cdr = $data->queryAll();
                if($cdr[0]['region_name']==$city){
                    $parent_id = $cdr[0]['region_id'];
                    $data = $connection->createCommand("SELECT * from ecs_region WHERE parent_id='$parent_id'");
                    $cdr = $data->queryAll();
                }
                header('Content-type: application/xml');
                echo '<?xml version="1.0" encoding="UTF8" ?>';
                echo "<rote>";
                    foreach($cdr as $k=>$v){
                        echo "<die".($k+1).">";
							echo $v['region_name'];
                        echo "</die".($k+1).">";
                    }
                echo "</rote>";
            }else{
                $this->error();
            }
        }else{
            $this->error();
        }
    }
    public function error(){
        $data = array("error"=>time());
        echo json_encode($data);
    }
    public function actionJsonp($city){
        ob_clean();
        $jsoncallback = htmlspecialchars($_REQUEST['forget']);
        $connection = \Yii::$app->db;
        $command = $connection->createCommand("SELECT * from ecs_region where region_name = '$city' ");
        $posts = $command->queryOne();
        if($posts){
            $parent_id = $posts['region_id'];
            $data = $connection->createCommand("SELECT * from ecs_region WHERE parent_id='$parent_id'");
            $cdr = $data->queryAll();
            if($cdr[0]['region_name']==$city){
                $parent_id = $cdr[0]['region_id'];
                $data = $connection->createCommand("SELECT * from ecs_region WHERE parent_id='$parent_id'");
                $cdr = $data->queryAll();
            }
            $json = json_encode($cdr);
            header('Content-type:application/json;charset=utf8');
            echo $jsoncallback . "(".$json.")";
        }else{
            $this->error();
        }
    }

    public function actionPage(){
        $model = new Index();
        $page = isset($_GET["page"])?$_GET['page']:1;
        $arr = $model->page($page,"20");
        return $this->render('page',['name'=>$arr]);
    }

}
