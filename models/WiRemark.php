<?php

namespace app\models;

use Yii;
use \app\models\base\WiRemark as BaseWiRemark;

/**
 * This is the model class for table "dbworkflow.wi_remark".
 */
class WiRemark extends BaseWiRemark
{
	
	public function attributeLabels()
	{
		return [
				'id' => 'ID',
				'user_id' => 'Author',
				'history_id' => 'History ID',
				'remark' => 'Remark',
				'status' => 'Status',
				'flag' => 'Flag',
				'statusStr' => 'Status',
		];
	}
	
	public function getStatusStr()
	{
		if($this->status == 0)
		{
			$rStatus = 'OPEN';
			$rClass = 'label label-danger';
		}
		else
		{
			$rStatus = 'CLOSE';
			$rClass = 'label label-success';
		}
		return '<span style="" class="' . $rClass . '">' . $rStatus . '</span>';
	}
	
	public function getUsername()
	{
		$user = $this->hasOne(User::className(), ['id' => 'user_id'])->one();
		return $user->name;
	}
	
}