<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menus".
 *
 * @property string $m_id
 * @property string $m_name
 * @property integer $m_pid
 * @property integer $number_id
 */
class Menus extends \yii\db\ActiveRecord{
    /**
     * @inheritdoc
     */
    public static function tableName(){
        return 'menus';
    }

    /**
     * @inheritdoc
     */
    public function rules(){
        return [
            [['m_pid', 'number_id'], 'integer'],
            [['m_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(){
        return [
            'm_id' => 'M ID',
            'm_name' => 'M Name',
            'm_pid' => 'M Pid',
            'number_id' => 'Number ID',
        ];
    }

    Public function 
}
