<?php

namespace app\models;

use Yii;
use \app\models\base\WiStatus as BaseWiStatus;

/**
 * This is the model class for table "dbworkflow.wi_status".
 */
class WiStatus extends BaseWiStatus
{
	public function attributeLabels()
	{
		return [
				'status_id' => 'Status ID',
				'status_name' => 'WI Status',
				'flag' => 'Flag',
		];
	}
}
