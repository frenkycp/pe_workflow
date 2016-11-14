<?php

namespace app\models;

use Yii;
use dmstr\helpers\Html;
use \app\models\base\Wi as BaseWi;

/**
 * This is the model class for table "wi".
 */
class Wi extends BaseWi
{
	public $wiUploadFile;
	
	public function attributeLabels()
    {
        return [
            'wi_id' => 'Wi ID',
            'wi_model' => 'Model',
            'wi_section' => 'Section',
            'wi_docno' => 'Document No',
            'wi_title' => 'Title',
            'wi_stagestat' => 'Stage',
            'wi_status' => 'Status',
            'wi_issue' => 'Issue Date',
            'wi_rev' => 'Rev',
            'wi_maker' => 'Wi Maker',
            'wi_filename' => 'Filename',
            'wi_file' => 'File',
            'wi_filename2' => 'Wi Filename2',
            'wi_file2' => 'Wi File2',
        ];
    }
    
    public function rules()
    {
    	return [
    			[['wiUploadFile'], 'file', 'extensions' => 'xls, xlsx'],
    			[['wi_filename', 'wi_file', 'wi_filename2', 'wi_file2'], 'string'],
    			[['wi_model'], 'string', 'max' => 200],
    			[['wi_section', 'wi_docno', 'wi_stagestat', 'wi_status', 'wi_issue'], 'string', 'max' => 50],
    			[['wi_title', 'wi_maker'], 'string', 'max' => 100],
    			[['wi_rev'], 'string', 'max' => 5]
    	];
    }
    
    public function upload()
    {
    	if ($this->validate()) {
    		$this->wiUploadFile->saveAs('uploads/' . $this->wiUploadFile->baseName . '.' . $this->wiUploadFile->extension);
    		return true;
    	} else {
    		return false;
    	}
    }
	
	public static function getDb() {
       return Yii::$app->get('db2'); // second database
	}
}
