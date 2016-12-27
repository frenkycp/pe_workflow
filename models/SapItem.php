<?php

namespace app\models;

use Yii;
use \app\models\base\SapItem as BaseSapItem;

/**
 * This is the model class for table "sap_item".
 */
class SapItem extends BaseSapItem
{
	public $descr;
	
	public function attributeLabels()
	{
		return [
				'item_id' => 'Item ID',
				'sap_partno' => 'Part No',
				'description' => 'Description',
				'uom' => 'UOM',
				'analyst_group' => 'Analyst Group',
				'analyst_desc' => 'Analyst Description',
				'issue_type_desc' => 'Issue Type',
				'item_class' => 'Class',
				'insert_type' => 'Insert Type',
				'flag' => 'Flag',
		];
	}
}
