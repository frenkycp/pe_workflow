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
				'sap_item_id' => 'Part No',
				'part_arr' => 'Part No',
				'flag' => 'Flag',
		];
	}
	
	public function rules()
	{
		return [
				[['masterlist_id', 'part_arr'], 'required'],
				[['masterlist_id', 'sap_item_id', 'flag'], 'integer']
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
	
}
