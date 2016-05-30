<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "doc_class".
 *
 * @property integer $doc_class_id
 * @property string $class_code
 * @property string $class_detail
 * @property integer $class_count
 *
 * @property \app\models\WiMasterlist[] $wiMasterlists
 */
class DocClass extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doc_class';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_code', 'class_detail'], 'required'],
            [['class_count'], 'integer'],
            [['class_code'], 'string', 'max' => 10],
            [['class_detail'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'doc_class_id' => 'Doc Class ID',
            'class_code' => 'Class Code',
            'class_detail' => 'Class Detail',
            'class_count' => 'Class Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWiMasterlists()
    {
        return $this->hasMany(\app\models\WiMasterlist::className(), ['doc_class' => 'doc_class_id']);
    }




}
