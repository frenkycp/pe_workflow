<?php

namespace app\models;

use Yii;
use \app\models\base\WiHistory as BaseWiHistory;
use yii\helpers\Url;

/**
 * This is the model class for table "dbworkflow.wi_history".
 */
class WiHistory extends BaseWiHistory
{
	public $wiDocno;
	
	public function attributeLabels()
	{
		return [
				'id' => 'ID',
				'wi_id' => 'Wi ID',
				'wi_stagestat' => 'Wi Stagestat',
				'revised_date' => 'Revised Date',
				'check1_date' => 'Check Masterlist Date',
				'check2_date' => 'Check SMILE Date',
				'check3_date' => 'Check Final Date',
				'approved_date' => 'Approved Date',
				'release_date' => 'Release Date',
				'wi_rev' => 'Wi Rev',
				'wi_maker_id' => 'Wi Maker ID',
				'wi_filename' => 'Wi Filename',
				'wi_file' => 'Wi File',
				'flag' => 'Flag',
				'linkedRev' => 'Rev',
				'wiDocno' => 'Document No',
		];
	}
	
	public function getLinkedRev()
	{
		$wi = Wi::find($this->wi_id);
		return '<a href="' . \Yii::$app->request->hostInfo . '/workflow/' . $this->wi_file . '">' . $this->wi_rev . '</a>';
	}
	
	public function getLinkedRemark()
	{
		$remarkOpen = $this->getRemarkOpen();
		return count($remarkOpen) > 0 ? '<a href="' . Url::to(['/wi-history/view', 'id' => $this->id]) . '">' . count($remarkOpen) . '</a>' : '0';
	}
	
	public function getUser()
	{
		return $this->hasOne(User::className(), ['id' => 'wi_maker_id']);
	}
	
	public function getRemarkOpen()
	{
		return $this->getWiRemarks()->where(['status' => 0])->all();
	}
	
}
