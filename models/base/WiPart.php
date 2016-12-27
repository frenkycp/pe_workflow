<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "wi_part".
 *
 * @property integer $wi_part_id
 * @property integer $masterlist_id
 * @property integer $sap_item_id
 * @property integer $flag
 *
 * @property \app\models\SapItem $sapItem
 * @property \app\models\WiMasterlist $masterlist
 */
class WiPart extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wi_part';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['masterlist_id', 'sap_item_id'], 'required'],
            [['masterlist_id', 'sap_item_id', 'flag'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'wi_part_id' => 'Wi Part ID',
            'masterlist_id' => 'Masterlist ID',
            'sap_item_id' => 'Sap Item ID',
            'flag' => 'Flag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSapItem()
    {
        return $this->hasOne(\app\models\SapItem::className(), ['item_id' => 'sap_item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMasterlist()
    {
        return $this->hasOne(\app\models\WiMasterlist::className(), ['masterlist_id' => 'masterlist_id']);
    }




}
