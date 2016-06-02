<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "doc_type".
 *
 * @property integer $doc_type_id
 * @property string $type_name
 * @property integer $flag
 *
 * @property \app\models\WiMasterlist[] $wiMasterlists
 */
class DocType extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doc_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_name'], 'required'],
            [['flag'], 'integer'],
            [['type_name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'doc_type_id' => 'Doc Type ID',
            'type_name' => 'Type Name',
            'flag' => 'Flag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWiMasterlists()
    {
        return $this->hasMany(\app\models\WiMasterlist::className(), ['doc_type' => 'doc_type_id']);
    }




}
