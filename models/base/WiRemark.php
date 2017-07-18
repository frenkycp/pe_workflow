<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "dbworkflow.wi_remark".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $history_id
 * @property string $remark
 * @property string $remark_date
 * @property string $feedback
 * @property string $feedback_date
 * @property integer $status
 * @property integer $flag
 *
 * @property \app\models\WiHistory $history
 */
class WiRemark extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dbworkflow.wi_remark';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'history_id', 'status', 'flag'], 'integer'],
            //[['remark'], 'required'],
            [['remark', 'feedback'], 'string'],
            [['remark_date', 'feedback_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'history_id' => 'History ID',
            'remark' => 'Remark',
            'remark_date' => 'Remark Date',
            'feedback' => 'Feedback',
            'feedback_date' => 'Feedback Date',
            'status' => 'Status',
            'flag' => 'Flag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistory()
    {
        return $this->hasOne(\app\models\WiHistory::className(), ['id' => 'history_id']);
    }

}
