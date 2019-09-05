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
 * @property integer $wg_count
 * @property integer $sok_count
 * @property integer $flag
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
            [['class_count', 'wg_count', 'sok_count', 'mfg_std_count', 'flag'], 'integer'],
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
            'class_code' => 'Code Name',
            'class_detail' => 'Code Detail',
            'class_count' => 'Total WI',
            'wg_count' => 'Total WG',
            'sok_count' => 'Total SOK',
            'mfg_std_count' => 'Total Mfg. Standart',
            'flag' => 'Flag',
        ];
    }




}
