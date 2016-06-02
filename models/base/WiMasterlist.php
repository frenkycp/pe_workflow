<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "wi_masterlist".
 *
 * @property integer $masterlist_id
 * @property string $doc_no
 * @property string $doc_title
 * @property integer $doc_class
 * @property string $speaker_model
 * @property integer $doc_section
 * @property integer $doc_type
 * @property integer $pic_id
 * @property string $date_modified
 * @property integer $user_id
 * @property integer $flag
 *
 * @property \app\models\User $pic
 * @property \app\models\User $user
 * @property \app\models\DocSection $docSection
 * @property \app\models\DocClass $docClass
 * @property \app\models\DocType $docType
 */
class WiMasterlist extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wi_masterlist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doc_no', 'doc_title', 'doc_class', 'speaker_model', 'doc_section', 'doc_type', 'pic_id', 'user_id'], 'required'],
            [['doc_class', 'doc_section', 'doc_type', 'pic_id', 'user_id', 'flag'], 'integer'],
            [['speaker_model'], 'string'],
            [['date_modified'], 'safe'],
            [['doc_no'], 'string', 'max' => 20],
            [['doc_title'], 'string', 'max' => 50],
            [['doc_no'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'masterlist_id' => 'Masterlist ID',
            'doc_no' => 'Doc No',
            'doc_title' => 'Doc Title',
            'doc_class' => 'Doc Class',
            'speaker_model' => 'Speaker Model',
            'doc_section' => 'Doc Section',
            'doc_type' => 'Doc Type',
            'pic_id' => 'Pic ID',
            'date_modified' => 'Date Modified',
            'user_id' => 'User ID',
            'flag' => 'Flag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPic()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'pic_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocSection()
    {
        return $this->hasOne(\app\models\DocSection::className(), ['doc_section_id' => 'doc_section']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocClass()
    {
        return $this->hasOne(\app\models\DocClass::className(), ['doc_class_id' => 'doc_class']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocType()
    {
        return $this->hasOne(\app\models\DocType::className(), ['doc_type_id' => 'doc_type']);
    }




}
