<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "dbworkflow.wi_part_detail".
 *
 * @property integer $wi_part_detail_id
 * @property integer $masterlist_id
 * @property string $update_date
 */
class WiPartDetail extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dbworkflow.wi_part_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['masterlist_id', 'update_date'], 'required'],
            [['masterlist_id'], 'integer'],
            [['update_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'wi_part_detail_id' => 'Wi Part Detail ID',
            'masterlist_id' => 'Doc. No.',
            'update_date' => 'Update Date',
        ];
    }




}
