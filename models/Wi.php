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
	public $uploadFile;
        public $wiModelFull;
        public $wiTitleFull;

        public static $_STATUS_OPEN = 'OPEN';
	public static $_STATUS_CHECKOUT = 'CHECK OUT';
	public static $_STATUS_CHECKIN = 'CHECK IN';
	public static $_STATUS_CHECK_MASTERLIST = 'CHECK MASTERLIST';
	public static $_STATUS_CHECK_MASTERLIST_OK = 'CHECK MASTERLIST OK';
	public static $_STATUS_CHECK_SMILE = 'CHECK SMILE';
	public static $_STATUS_CHECK_SMILE_OK = 'CHECK SMILE OK';
	public static $_STATUS_CHECK_FINAL = 'FINAL CHECK';
	public static $_STATUS_CHECK_FINAL_OK = 'FINAL CHECK OK';
	public static $_STATUS_WAITING_APPR = 'WAITING APPROVAL';
	public static $_STATUS_APPROVE = 'APPROVED';
	public static $_STATUS_WAITING_DIST = 'WAITING DISTRIBUTION';
	public static $_STATUS_CLOSE = 'CLOSE';
	public static $_STATUS_REJECT = 'REJECTED';
	
	public $revised_date;
	public $release_date;
	public $part_no;
	
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
        	'wi_filename3' => 'Wi Filename3',
        	'wi_file3' => 'Wi File3',
        	'wi_remark' => 'Remark',
        	'wi_dcn' => 'Purpose',
        ];
    }
    
    public function rules()
    {
    	return [
    			[['wi_status'], 'required'],
    			[['wi_status'], 'integer'],
    			[['wi_issue'], 'safe'],
    			[['uploadFile'], 'file', 'checkExtensionByMimeType' => false, 'skipOnEmpty' => true, 'extensions' => 'xls, xlsx, pdf'],
    			[['wi_filename', 'wi_file', 'wi_filename2', 'wi_file2', 'wi_filename3', 'wi_file3', 'wi_remark', 'wi_dcn'], 'string'],
    			[['wi_model'], 'string', 'max' => 200],
    			[['wi_section', 'wi_docno', 'wi_stagestat'], 'string', 'max' => 50],
    			[['wi_title', 'wi_maker'], 'string', 'max' => 200],
    			[['wi_rev'], 'string', 'max' => 5]
    	];
    }
    
    public function upload()
    {
    	if ($this->validate()) {
    		$this->uploadFile->saveAs(\Yii::getAlias('@webroot') . '/../../workflow/files/wi/' . $this->uploadFile->baseName . '.' . $this->uploadFile->extension);
    		return true;
    	} else {
    		return false;
    	}
    }
    
    public function getWiPart()
    {
    	return $this->hasMany(WiPart::className(), ['masterlist_id' => 'wi_id']);
    }
    
    public function getDcnWi()
    {
        return $this->hasOne(\app\models\DcnWi::className(), ['widocno' => 'wi_docno']);
    }
    
    public static function getUploadPath()
    {
    	return \Yii::getAlias('@webroot') . '/../../workflow/files/wi/';
    }
	
	public static function getDb() {
       return Yii::$app->get('db2'); // second database
	}
}
