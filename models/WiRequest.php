<?php

namespace app\models;

use Yii;
use \app\models\base\WiRequest as BaseWiRequest;

/**
 * This is the model class for table "dbworkflow.wi_request".
 */
class WiRequest extends BaseWiRequest
{
	public $requestor_name;
	public $wi_docno;
	public $wi_title;
	public $wi_model;
	public $record_no;
	public $rev_no;
	public $doc_title;
	
	public function getRequestType()
	{
		if($this->request_type == 1)
		{
			return 'CHANGE REQUEST';
		}
		elseif ($this->request_type == 2)
		{
			return 'CONTROLLED COPY';
		}
	}
	
	public function getStatusStr()
	{
		if($this->status == 0)
		{
			return 'OPEN';
		}
		elseif ($this->status == 1)
		{
			return 'CLOSED';
		}
	}
	
}
