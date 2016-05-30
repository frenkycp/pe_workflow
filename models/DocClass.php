<?php

namespace app\models;

use Yii;
use \app\models\base\DocClass as BaseDocClass;

/**
 * This is the model class for table "doc_class".
 */
class DocClass extends BaseDocClass
{
	public function getDropdownLabel()
	{
		return $this->class_code . " (" . $this->class_detail . ")";
	}
}
