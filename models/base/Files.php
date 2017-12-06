<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "dbworkflow.files".
 *
 * @property integer $file_id
 * @property string $file_docno
 * @property string $file_type
 * @property string $file_name
 * @property string $file_path
 */
class Files extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dbworkflow.files';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['file_docno', 'file_name', 'file_path'], 'required'],
            [['file_name', 'file_path'], 'string'],
            [['file_docno'], 'string', 'max' => 200],
            [['file_type'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'file_id' => 'File ID',
            'file_docno' => 'File Docno',
            'file_type' => 'File Type',
            'file_name' => 'File Name',
            'file_path' => 'File Path',
        ];
    }




}
