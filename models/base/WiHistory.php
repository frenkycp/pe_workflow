<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "dbworkflow.wi_history".
 *
 * @property integer $id
 * @property integer $wi_id
 * @property string $wi_stagestat
 * @property string $revised_date
 * @property string $check1_date
 * @property string $check2_date
 * @property string $check3_date
 * @property string $approved_date
 * @property string $release_date
 * @property string $wi_rev
 * @property integer $wi_maker_id
 * @property string $wi_filename
 * @property string $wi_file
 * @property string $purpose
 * @property string $reject_date
 * @property integer $rejector_id
 * @property integer $flag
 */
class WiHistory extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dbworkflow.wi_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wi_id', 'wi_rev', 'wi_maker_id'], 'required'],
            [['wi_id', 'wi_maker_id', 'rejector_id', 'flag'], 'integer'],
            [['revised_date', 'check1_date', 'check2_date', 'check3_date', 'approved_date', 'release_date', 'reject_date'], 'safe'],
            [['wi_filename', 'wi_file', 'purpose'], 'string'],
            [['wi_stagestat'], 'string', 'max' => 5],
            [['wi_rev'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'wi_id' => 'Wi ID',
            'wi_stagestat' => 'Wi Stagestat',
            'revised_date' => 'Revised Date',
            'check1_date' => 'Check1 Date',
            'check2_date' => 'Check2 Date',
            'check3_date' => 'Check3 Date',
            'approved_date' => 'Approved Date',
            'release_date' => 'Release Date',
            'wi_rev' => 'Wi Rev',
            'wi_maker_id' => 'Wi Maker ID',
            'wi_filename' => 'Wi Filename',
            'wi_file' => 'Wi File',
            'purpose' => 'Purpose',
            'reject_date' => 'Reject Date',
            'rejector_id' => 'Rejector ID',
            'flag' => 'Flag',
        ];
    }

    public function getWi()
    {
    	return $this->hasOne(\app\models\Wi::className(), ['wi_id' => 'wi_id']);
    }
    public function getWiRemarks()
    {
    	return $this->hasMany(\app\models\WiRemark::className(), ['history_id' => 'id']);
    }
    public function getRejector()
    {
    	return $this->hasOne(\app\models\User::className(), ['id' => 'rejector_id']);
    }
}
