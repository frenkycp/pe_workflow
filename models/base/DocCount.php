<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "doc_count".
 *
 * @property integer $masterlist_count_id
 * @property string $doc_type
 * @property string $doc_section
 * @property integer $count
 */
class DocCount extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doc_count';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doc_type', 'doc_section', 'count'], 'required'],
            [['count'], 'integer'],
            [['doc_type', 'doc_section'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'masterlist_count_id' => 'Masterlist Count ID',
            'doc_type' => 'Doc Type',
            'doc_section' => 'Doc Section',
            'count' => 'Count',
        ];
    }




}
