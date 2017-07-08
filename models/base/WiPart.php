<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "dbworkflow.wi_part".
 *
 * @property integer $wi_part_id
 * @property integer $masterlist_id
 * @property string $sap_partno
 * @property integer $flag
 */
class WiPart extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dbworkflow.wi_part';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['masterlist_id'], 'required'],
            [['masterlist_id', 'flag'], 'integer'],
            [['sap_partno'], 'string', 'max' => 15]
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
            'sap_partno' => 'Sap Partno',
            'flag' => 'Flag',
        ];
    }

}
