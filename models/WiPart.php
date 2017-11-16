<?php

namespace app\models;

use Yii;
use \app\models\base\WiPart as BaseWiPart;

/**
 * This is the model class for table "wi_part".
 */
class WiPart extends BaseWiPart
{
	public $part_arr;
	public $partNo;
	public $partName;
	public $documentNo;
	
	public function attributeLabels()
	{
		return [
				'wi_part_id' => 'Wi Part ID',
				'masterlist_id' => 'Document No.',
				'part_arr' => 'Part No',
				'sap_partno' => 'Part No',
				'flag' => 'Flag',
		];
	}
	
	public function rules()
	{
		return [
				[['masterlist_id'], 'required'],
				[['masterlist_id', 'flag'], 'integer'],
				[['part_arr'], 'string'],
				[['sap_partno'], 'string', 'max' => 15],
		];
	}
	
	public function getPartNo()
	{
		return $this->sapItem->sap_partno;
	}
	
	public function getPartName()
	{
		return $this->sapItem->description;
	}

	public static function getDb() {
       return Yii::$app->get('db2'); // second database
	}
	
	public function getWi()
	{
		return $this->hasOne(\app\models\Wi::className(), ['wi_id' => 'masterlist_id']);
	}
	
	public function getSapItem()
	{
		return $this->hasOne(\app\models\SapItem::className(), ['sap_partno' => 'sap_partno']);
	}
	
}
