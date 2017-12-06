<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "dbworkflow.dcn".
 *
 * @property integer $dcn_id
 * @property string $dcn_dl
 * @property string $dcn_nowf
 * @property string $dcn_type
 * @property string $dcn_partno
 * @property string $dcn_partname
 * @property string $dcn_supplier
 * @property string $dcn_no
 * @property string $dcn_title
 * @property string $dcn_spec
 * @property string $dcn_effect
 * @property string $dcn_rev
 * @property string $dcn_model
 * @property string $dcn_section
 * @property string $dcn_issue
 * @property string $dcn_approvalstat
 * @property string $dcn_stat
 * @property string $wi_stat
 * @property string $pur_stat
 * @property string $iqa_stat
 * @property string $pc_stat
 */
class Dcn extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dbworkflow.dcn';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dcn_dl'], 'safe'],
            [['dcn_title', 'dcn_spec', 'dcn_model'], 'string'],
            [['dcn_nowf'], 'string', 'max' => 10],
            [['dcn_type', 'dcn_partno', 'dcn_no', 'dcn_rev', 'dcn_issue'], 'string', 'max' => 20],
            [['dcn_partname', 'dcn_supplier', 'dcn_section'], 'string', 'max' => 100],
            [['dcn_effect', 'dcn_stat'], 'string', 'max' => 50],
            [['dcn_approvalstat'], 'string', 'max' => 15],
            [['wi_stat', 'pur_stat', 'iqa_stat', 'pc_stat'], 'string', 'max' => 7]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dcn_id' => 'Dcn ID',
            'dcn_dl' => 'Dcn Dl',
            'dcn_nowf' => 'Dcn Nowf',
            'dcn_type' => 'Dcn Type',
            'dcn_partno' => 'Dcn Partno',
            'dcn_partname' => 'Dcn Partname',
            'dcn_supplier' => 'Dcn Supplier',
            'dcn_no' => 'Dcn No',
            'dcn_title' => 'Dcn Title',
            'dcn_spec' => 'Dcn Spec',
            'dcn_effect' => 'Dcn Effect',
            'dcn_rev' => 'Dcn Rev',
            'dcn_model' => 'Dcn Model',
            'dcn_section' => 'Dcn Section',
            'dcn_issue' => 'Dcn Issue',
            'dcn_approvalstat' => 'Dcn Approvalstat',
            'dcn_stat' => 'Dcn Stat',
            'wi_stat' => 'Wi Stat',
            'pur_stat' => 'Pur Stat',
            'iqa_stat' => 'Iqa Stat',
            'pc_stat' => 'Pc Stat',
        ];
    }




}
