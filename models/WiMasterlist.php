<?php

namespace app\models;

use Yii;
use \app\models\base\WiMasterlist as BaseWiMasterlist;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "wi_masterlist".
 */
class WiMasterlist extends BaseWiMasterlist
{
	public $isAutoAdd;
	
    public function attributeLabels()
    {
        return [
            'masterlist_id' => 'Masterlist ID',
            'doc_no' => 'Doc No',
            'doc_title' => 'Doc. Title',
            'doc_class' => 'Doc. Class',
            'speaker_model' => 'Model',
            'doc_section' => 'Doc. Section',
            'doc_type' => 'Doc. Type',
            'pic_id' => 'PIC',
            'date_modified' => 'Date Modified',
            'user_id' => 'Modified By',
			'picName' => 'PIC Name',
			'userName' => 'Modified By'
        ];
    }
	
	public function rules()
    {
        return [
            [['doc_title', 'doc_class', 'speaker_model', 'doc_section', 'doc_type', 'pic_id'], 'required'],
            [['doc_class', 'doc_section', 'doc_type', 'pic_id', 'user_id', 'isAutoAdd'], 'integer'],
            [['speaker_model'], 'string'],
            [['date_modified'], 'safe'],
            [['doc_no'], 'string', 'max' => 20],
            [['doc_title'], 'string', 'max' => 50],
            [['doc_no'], 'unique']
        ];
    }
	
	public function getPicName()
	{
		return $this->pic->name;
	}
	
	public function getUserName()
	{
		return $this->user->name;
	}
	
	public function getUserDropdown()
	{
		return ArrayHelper::map(User::find()->orderBy('name')->all(), 'id', 'name');
	}
    
    public function beforeSave($insert){
        if(parent::beforeSave($insert)){
			$result = DocClass::findOne(['doc_class_id' => $this->doc_class]);
			date_default_timezone_set('Asia/Jakarta');
            if($this->isNewRecord)
            {
				$tmp_class = $result->class_code;
				//echo $this->doc_class . ' - ' . $tmp_class . ' - ';
				//exit();
				$result->class_count++;
				if ($result->save())
				{
					$this->user_id = Yii::$app->user->id;
					$this->doc_no = $result->class_code . str_pad($result->class_count, 4, '0', STR_PAD_LEFT);
				}
            }
			$this->doc_class = $result->primaryKey;
			
			$now = new \DateTime();
			$this->date_modified = $now->format('Y-m-d H:i:s');
			//$this->date_modified = date('Y-m-d h:i:s');
			$this->user_id = Yii::$app->user->id;
			return true;
        }
    }
}
