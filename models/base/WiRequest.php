<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "dbworkflow.wi_request".
 *
 * @property integer $id
 * @property integer $wi_id
 * @property integer $request_type
 * @property string $request_from
 * @property string $request_date
 * @property string $required_date
 * @property string $page_no
 * @property string $change_item
 * @property string $reason
 * @property integer $requestor_id
 * @property integer $status
 * @property integer $flag
 *
 * @property \app\models\Wi $wi
 */
class WiRequest extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dbworkflow.wi_request';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wi_id', 'request_type', 'requestor_id', 'status', 'flag'], 'integer'],
            [['request_type', 'request_from', 'page_no', 'reason'], 'required'],
        	[['request_date', 'required_date', 'closing_date'], 'safe'],
            [['request_from', 'reason'], 'string', 'max' => 20],
            [['page_no'], 'string', 'max' => 30],
        	[['change_item'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'wi_id' => 'Wi ID',
            'request_type' => 'Request Type',
            'request_from' => 'Request From',
            'request_date' => 'Request Date',
            'required_date' => 'Required Date',
        	'closing_date' => 'Closing Date',
            'page_no' => 'Page No',
            'change_item' => 'Change Item',
            'reason' => 'Reason',
            'requestor_id' => 'Requestor ID',
            'status' => 'Status',
            'flag' => 'Flag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWi()
    {
        return $this->hasOne(\app\models\Wi::className(), ['wi_id' => 'wi_id']);
    }

    public function getRequestor()
    {
    	return $this->hasOne(\app\models\User::className(), ['id' => 'requestor_id']);
    }
}
