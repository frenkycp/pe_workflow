<?php

namespace app\models;

use Yii;
use \app\models\base\Dcn as BaseDcn;

/**
 * This is the model class for table "dbworkflow.dcn".
 */
class Dcn extends BaseDcn
{
    public function attributeLabels()
    {
        return [
            'dcn_id' => 'Dcn ID',
            'dcn_dl' => 'Download Date',
            'dcn_nowf' => 'Workflow No.',
            'dcn_type' => 'DCN Type',
            'dcn_partno' => 'Part No.',
            'dcn_partname' => 'Part Name',
            'dcn_supplier' => 'Supplier',
            'dcn_title' => 'DCN Title',
            'dcn_spec' => 'Specification',
            'dcn_effect' => 'Effective Date',
            'dcn_rev' => 'DCN Rev',
            'dcn_model' => 'DCN Model',
            'dcn_section' => 'DCN Section',
            'dcn_issue' => 'Issue Date',
            'dcn_approvalstat' => 'Approval Status',
            'dcn_stat' => 'DCN Status',
            'wi_stat' => 'WI Stat',
            'pur_stat' => 'Purchasing Stat',
            'iqa_stat' => 'IQA Stat',
            'pc_stat' => 'PC Stat',
        ];
    }
}
