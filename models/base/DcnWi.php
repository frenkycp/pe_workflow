<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "dbworkflow.dcn_wi".
 *
 * @property integer $id
 * @property string $dcnno
 * @property string $widocno
 * @property string $stat
 */
class DcnWi extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dbworkflow.dcn_wi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dcnno', 'widocno', 'stat'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dcnno' => 'Dcnno',
            'widocno' => 'Widocno',
            'stat' => 'Stat',
        ];
    }




}
