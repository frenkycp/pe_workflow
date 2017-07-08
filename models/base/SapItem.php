<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "sap_item".
 *
 * @property integer $item_id
 * @property string $sap_partno
 * @property string $description
 * @property string $uom
 * @property string $analyst_group
 * @property string $analyst_desc
 * @property string $issue_type_desc
 * @property string $item_class
 * @property integer $insert_type
 * @property integer $flag
 *
 * @property \app\models\WiPart[] $wiParts
 */
class SapItem extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sap_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sap_partno'], 'required'],
            [['insert_type', 'flag'], 'integer'],
            [['sap_partno'], 'string', 'max' => 15],
            [['description'], 'string', 'max' => 50],
            [['uom', 'item_class'], 'string', 'max' => 5],
            [['analyst_group', 'issue_type_desc'], 'string', 'max' => 20],
            [['analyst_desc'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_id' => 'Item ID',
            'sap_partno' => 'Sap Partno',
            'description' => 'Description',
            'uom' => 'Uom',
            'analyst_group' => 'Analyst Group',
            'analyst_desc' => 'Analyst Desc',
            'issue_type_desc' => 'Issue Type Desc',
            'item_class' => 'Item Class',
            'insert_type' => 'Insert Type',
            'flag' => 'Flag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWiParts()
    {
        return $this->hasMany(\app\models\WiPart::className(), ['sap_item_id' => 'item_id']);
    }




}
