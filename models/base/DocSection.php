<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "doc_section".
 *
 * @property integer $doc_section_id
 * @property string $section_name
 *
 * @property \app\models\WiMasterlist[] $wiMasterlists
 */
class DocSection extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doc_section';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['section_name'], 'required'],
            [['section_name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'doc_section_id' => 'Doc Section ID',
            'section_name' => 'Section Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWiMasterlists()
    {
        return $this->hasMany(\app\models\WiMasterlist::className(), ['doc_section' => 'doc_section_id']);
    }




}
