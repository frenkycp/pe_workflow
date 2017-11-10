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
	public $uploadFile;
        public $wiSection;
	
	public function rules()
	{
		return [
				[['wi_id', 'request_type', 'requestor_id', 'status', 'flag'], 'integer'],
				[['uploadFile'], 'file', 'checkExtensionByMimeType' => false, 'skipOnEmpty' => true, 'extensions' => 'pdf'],
				[['request_type', 'request_from', 'page_no', 'reason'], 'required'],
				[['request_date', 'required_date', 'closing_date'], 'safe'],
				[['request_file', 'request_filename'], 'string'],
				[['request_from', 'reason'], 'string', 'max' => 20],
				[['page_no'], 'string', 'max' => 30],
				[['change_item'], 'string', 'max' => 100]
		];
	}
	
	public function upload()
	{
		if ($this->validate()) {
			$this->uploadFile->saveAs(\Yii::getAlias('@webroot') . '/../../workflow/files/wi_request/' . $this->uploadFile->baseName . '.' . $this->uploadFile->extension);
			return true;
		} else {
			return false;
		}
	}
	
	public static function getUploadPath()
	{
		return \Yii::getAlias('@webroot') . '/../../workflow/files/wi_request/';
	}
	
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
