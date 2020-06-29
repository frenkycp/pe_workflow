<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "dbworkflow.wi".
 *
 * @property integer $wi_id
 * @property string $wi_model
 * @property string $wi_section
 * @property string $wi_docno
 * @property string $wi_title
 * @property string $wi_stagestat
 * @property integer $wi_status
 * @property string $wi_issue
 * @property string $wi_rev
 * @property string $wi_maker
 * @property string $wi_filename
 * @property string $wi_file
 * @property string $wi_filename2
 * @property string $wi_file2
 * @property string $wi_filename3
 * @property string $wi_file3
 * @property string $filename_4
 * @property string $file_4
 * @property string $wi_remark
 * @property string $wi_dcn
 * @property string $wi_loc
 */
class Wi extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dbworkflow.wi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wi_status'], 'integer'],
            [['wi_issue'], 'safe'],
            [['wi_filename', 'wi_file', 'wi_filename2', 'wi_file2', 'wi_filename3', 'wi_file3', 'filename_4', 'file_4', 'wi_remark', 'wi_dcn'], 'string'],
            [['wi_model', 'wi_title'], 'string', 'max' => 200],
            [['wi_section', 'wi_docno', 'wi_stagestat'], 'string', 'max' => 50],
            [['wi_rev'], 'string', 'max' => 5],
            [['wi_maker'], 'string', 'max' => 100],
            [['wi_loc'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'wi_id' => 'Wi ID',
            'wi_model' => 'Wi Model',
            'wi_section' => 'Wi Section',
            'wi_docno' => 'Wi Docno',
            'wi_title' => 'Wi Title',
            'wi_stagestat' => 'Wi Stagestat',
            'wi_status' => 'Wi Status',
            'wi_issue' => 'Wi Issue',
            'wi_rev' => 'Wi Rev',
            'wi_maker' => 'Wi Maker',
            'wi_filename' => 'Wi Filename',
            'wi_file' => 'Wi File',
            'wi_filename2' => 'Wi Filename2',
            'wi_file2' => 'Wi File2',
            'wi_filename3' => 'Wi Filename3',
            'wi_file3' => 'Wi File3',
            'filename_4' => 'Filename 4',
            'file_4' => 'File 4',
            'wi_remark' => 'Wi Remark',
            'wi_dcn' => 'Wi Dcn',
            'wi_loc' => 'Wi Loc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    

}
